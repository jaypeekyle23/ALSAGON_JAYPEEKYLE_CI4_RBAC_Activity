<?php

namespace App\Controllers\Api;

use CodeIgniter\Controller;

class BaseApiController extends Controller
{
    protected function ok($data = null, string $message = '')
    {
        return $this->response->setStatusCode(200)->setJSON([
            'status'  => 200,
            'message' => $message,
            'data'    => $data
        ]);
    }

    protected function created($data = null, string $message = '')
    {
        $response = ['status' => 201, 'message' => $message];
        
        // Merge the token data directly into the response root to match the prof's format
        if (is_array($data)) {
            $response = array_merge($response, $data);
        }

        return $this->response->setStatusCode(201)->setJSON($response);
    }

    protected function badRequest(string $message = 'Bad Request')
    {
        return $this->response->setStatusCode(400)->setJSON([
            'status'  => 400,
            'message' => $message
        ]);
    }
}