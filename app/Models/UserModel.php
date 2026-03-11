<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Point this model to the users table we just updated
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    // Add all the new profile columns so CodeIgniter is allowed to save them
    protected $allowedFields = [
        'fullname', 'username', 'password', 'role', // Existing fields
        'name', 'email', 'student_id', 'course', 
        'year_level', 'section', 'phone', 'address', 'profile_image' // New profile fields
    ];

    // Add the custom updateProfile method required by your activity
    public function updateProfile(int $userId, array $data): bool
    {
        return $this->update($userId, $data);
    }
}