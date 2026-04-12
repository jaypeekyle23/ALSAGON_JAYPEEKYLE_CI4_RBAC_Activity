<?php

namespace App\Controllers\Api;

use CodeIgniter\Controller;

class AuthController extends Controller
{
    /**
     * API Endpoint: POST /api/v1/auth/token
     * Authenticates a user and generates an API token.
     */
    public function issueToken()
    {
        // 1. Grab the credentials sent from Postman (Postman sends 'email')
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if (empty($email) || empty($password)) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => 400,
                'message' => 'Email and password are required'
            ]);
        }

        // 2. Connect to the database and find the user
        $db = \Config\Database::connect();
        
        // THE FIX: Tell CodeIgniter to look in the 'username' column for the $email variable
        $user = $db->table('users')->where('username', $email)->get()->getRowArray();

        // 3. Verify the user exists and the password is correct
        // (This checks both hashed passwords and plain-text passwords just in case)
        if (!$user || (!password_verify($password, $user['password']) && $password !== $user['password'])) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 401,
                'message' => 'Invalid email or password'
            ]);
        }

        // 4. Generate a secure, random API token
        $token = bin2hex(random_bytes(32));

        // 5. Save the token to your database so it can be verified on future requests
        $db->table('api_tokens')->insert([
            'user_id'    => $user['id'] ?? $user['user_id'] ?? 0, 
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // 6. Return the success response with the new token
        return $this->response->setStatusCode(200)->setJSON([
            'status'  => 200,
            'message' => 'Authentication successful',
            'token'   => $token
        ]);
    }

    /**
     * API Endpoint: DELETE /api/v1/auth/token
     * Revokes an API token (Logs the user out).
     */
    public function revokeToken()
    {
        $authHeader = $this->request->getHeaderLine('Authorization');
        
        if (str_starts_with($authHeader, 'Bearer ')) {
            $token = trim(substr($authHeader, 7));
            
            // Delete the token from the database
            $db = \Config\Database::connect();
            $db->table('api_tokens')->where('token', $token)->delete();

            return $this->response->setStatusCode(200)->setJSON([
                'status'  => 200, 
                'message' => 'Token revoked successfully (Logged out)'
            ]);
        }
        
        return $this->response->setStatusCode(400)->setJSON([
            'status'  => 400,
            'message' => 'Token not provided'
        ]);
    }
}