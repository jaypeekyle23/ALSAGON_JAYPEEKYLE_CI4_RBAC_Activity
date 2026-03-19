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
        'fullname', 'username', 'password', 'role', 'role_id', // added role_id
        'name', 'email', 'student_id', 'course', 
        'year_level', 'section', 'phone', 'address', 'profile_image' // New profile fields
    ];

    // Add the custom updateProfile method required by your activity
    public function updateProfile(int $userId, array $data): bool
    {
        return $this->update($userId, $data);
    }

    // NEW METHOD: Fetches the user and joins the roles table
    public function getUserWithRole($username)
    {
        return $this->select('users.*, roles.name as role_name')
                    ->join('roles', 'roles.id = users.role_id', 'left')
                    ->where('username', $username)
                    ->first();
    }
}