<?php

namespace App\Controllers\Api;

use App\Models\ApiTokenModel;

class AuthController extends BaseApiController
{
    /** Token lifetime in seconds (default: 24 h) */
    private const TOKEN_TTL = 86400;

    /**
     * API Endpoint: POST /api/v1/auth/token
     * Authenticates a user and generates an API token.
     */
    public function issueToken()
    {
        // 1. Grab the credentials sent from Postman
        $email    = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if (empty($email) || empty($password)) {
            return $this->badRequest('Email and password are required.');
        }

        // 2. Connect to the database and find the user
        $db = \Config\Database::connect();
        
        // THE FIX: Tell CodeIgniter to look in the 'username' column for the $email variable
        $user = $db->table('users')->where('username', $email)->get()->getRowArray();

        // 3. Verify the user exists and the password is correct
        if (!$user || (!password_verify($password, $user['password']) && $password !== $user['password'])) {
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 401,
                'message' => 'Invalid credentials.'
            ]);
        }

        // 4. Generate a cryptographically secure token and calculate expiration
        $token     = bin2hex(random_bytes(32)); 
        $expiresAt = date('Y-m-d H:i:s', time() + self::TOKEN_TTL);

        // 5. Save the token to your database using the new ApiTokenModel
        $tokenModel = new ApiTokenModel();
        // Handle variations in primary key names just in case
        $userId = $user['id'] ?? $user['user_id'] ?? 0;
        
        $tokenModel->createToken($userId, $token, $expiresAt);

        // 6. Return the exact JSON structure the professor expects
        return $this->created([
            'token'      => $token,
            'token_type' => 'Bearer',
            'expires_at' => $expiresAt,
            'user'       => [
                'id'    => $userId,
                'name'  => $user['fullname'] ?? ($user['first_name'] . ' ' . $user['last_name']),
                'email' => $user['username'],
            ],
        ], 'Token issued.');
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
            
            // Delete the token from the database using our new Model
            $tokenModel = new ApiTokenModel();
            $tokenModel->deleteByToken($token);

            // Use the OK method from our BaseApiController
            return $this->ok(null, 'Token revoked.');
        }
        
        return $this->badRequest('Token not provided.');
    }
}