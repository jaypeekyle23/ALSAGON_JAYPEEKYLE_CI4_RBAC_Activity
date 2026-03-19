<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserAdminController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $users = $db->table('users')->get()->getResultArray();
        
        // Fetch from the correct 'roles' table so the IDs match the foreign key!
        $roles = $db->table('roles')->select('id as role_id, name as role_name')->get()->getResultArray();

        $data = array_merge($this->data ?? [], [
            'title' => 'Assign User Roles',
            'users' => $users,
            'roles' => $roles
        ]);

        return view('admin/users/index', $data);
    }

    public function assignRole($id)
    {
        $db = \Config\Database::connect();
        $newRoleId = $this->request->getPost('role_id');

        // Block admin from changing their own role
        $currentUserId = session('user')['id'] ?? session()->get('id') ?? 1; 
        if ($id == $currentUserId) {
            return redirect()->back()->with('error', 'Security Alert: You cannot change your own role!');
        }

        // Update the user's role_id in the database
        $db->table('users')->where('id', $id)->update([
            'role_id' => $newRoleId 
        ]);

        return redirect()->back()->with('success', 'User role updated! They must log out and log back in for changes to take effect.');
    }
}