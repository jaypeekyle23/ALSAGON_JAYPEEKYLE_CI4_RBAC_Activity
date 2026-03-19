<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class RoleController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        // Fetch from the exam's 'roles' table, aliasing to match your views
        $roles = $db->table('roles')->select('id as role_id, name as role_name')->get()->getResultArray(); 

        $data = array_merge($this->data ?? [], [
            'title' => 'Manage Roles',
            'roles' => $roles
        ]);

        return view('admin/roles/index', $data);
    }

    public function create() 
    {
        $data = array_merge($this->data ?? [], [
            'title' => 'Create New Role'
        ]);

        return view('admin/roles/create', $data);
    }

    public function store() 
    {
        $db = \Config\Database::connect();
        $name = $this->request->getPost('name');
        
        if (empty($name)) {
            return redirect()->back()->with('error', 'Role name is required!');
        }

        // Insert into the correct 'roles' table
        $db->table('roles')->insert([
            'name'  => strtolower($name),
            'label' => ucfirst($name) // Added label just in case the migration requires it
        ]);

        return redirect()->to('admin/roles')->with('success', 'New role created successfully!');
    }

    public function edit($id)
    {
        $db = \Config\Database::connect();
        
        $role = $db->table('roles')->select('id as role_id, name as role_name')->where('id', $id)->get()->getRowArray();

        if (!$role) {
            return redirect()->to('admin/roles')->with('error', 'Role not found.');
        }

        $data = array_merge($this->data ?? [], [
            'title' => 'Edit Role',
            'role' => $role
        ]);

        return view('admin/roles/edit', $data);
    }

    public function update($id)
    {
        $db = \Config\Database::connect();
        $name = $this->request->getPost('name');
        
        if (empty($name)) {
            return redirect()->back()->with('error', 'Role name is required!');
        }

        $existingRole = $db->table('roles')->where('id', $id)->get()->getRowArray();
        $currentName = strtolower($existingRole['name'] ?? '');

        // Lock the slug for core roles
        $coreRoles = ['admin', 'teacher', 'student'];
        if (in_array($currentName, $coreRoles) && strtolower($name) !== $currentName) {
            return redirect()->back()->with('error', 'You cannot change the name of core roles (Admin, Teacher, Student)!');
        }

        // Update the correct 'roles' table
        $db->table('roles')->where('id', $id)->update([
            'name' => strtolower($name),
            'label' => ucfirst($name)
        ]);

        return redirect()->to('admin/roles')->with('success', 'Role updated successfully!');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        
        $existingRole = $db->table('roles')->where('id', $id)->get()->getRowArray();
        $currentName = strtolower($existingRole['name'] ?? '');

        // Prevent deletion of Admin
        if ($currentName === 'admin' || $id == 1) {
            return redirect()->to('admin/roles')->with('error', 'Security Alert: You cannot delete the Admin role!');
        }

        $db->table('roles')->where('id', $id)->delete();

        return redirect()->to('admin/roles')->with('success', 'Role deleted successfully!');
    }
}