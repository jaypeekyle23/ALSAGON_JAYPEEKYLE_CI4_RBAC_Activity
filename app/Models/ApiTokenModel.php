<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiTokenModel extends Model
{
    protected $table = 'api_tokens';
    protected $primaryKey = 'id';
    
    // These are the columns the model is allowed to modify
    protected $allowedFields = ['user_id', 'token', 'expires_at', 'created_at'];

    public function createToken($userId, $token, $expiresAt)
    {
        return $this->insert([
            'user_id'    => $userId,
            'token'      => $token,
            'expires_at' => $expiresAt,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function deleteByToken($token)
    {
        return $this->where('token', $token)->delete();
    }
}