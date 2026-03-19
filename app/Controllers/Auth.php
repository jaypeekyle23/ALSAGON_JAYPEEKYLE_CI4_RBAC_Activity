<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel; 

class Auth extends BaseController
{
    public function index()
    {
        // === NEW FIX: Check role if already logged in ===
        if (session()->get('isLoggedIn') == TRUE) {
            if (session('user')['role'] === 'student') {
                return redirect()->to(base_url('student/dashboard'));
            }
            return redirect()->to(base_url('dashboard'));
        }
        // ================================================

        if (!$this->validate(['inputEmail'  => 'required'])) {
            return view('pages/commons/login');
        } else {
            $inputEmail     = htmlspecialchars($this->request->getVar('inputEmail', FILTER_UNSAFE_RAW));
            $inputPassword  = htmlspecialchars($this->request->getVar('inputPassword', FILTER_UNSAFE_RAW));
            
            // Call our method from UserModel
            $userModel = new UserModel();
            $user      = $userModel->getUserWithRole($inputEmail);

            if ($user) {
                $password = $user['password'];
                
                // Fallback so plain-text passwords work during testing
                $verify = password_verify($inputPassword, $password) || $inputPassword === $password;

                if ($verify) {
                    // Store session exactly as the activity matrix requires
                    // AND keep the original root keys so your Starter Panel doesn't break!
                    session()->set([
                        'user' => [
                            'id'       => $user['id'],
                            'name'     => $user['fullname'], 
                            'fullname' => $user['fullname'], 
                            'email'    => $user['username'], 
                            'role'     => $user['role_name'] 
                        ],
                        'isLoggedIn' => TRUE,
                        // Restoring the original keys your Starter Panel relies on:
                        'username'   => $user['username'], 
                        'role'       => $user['role_id']      
                    ]);

                    // Redirect based on role
                    $role = $user['role_name'];
                    if ($role === 'student') {
                        return redirect()->to(base_url('student/dashboard'));
                    } else {
                        // admin, teacher, coordinator all go to the main dashboard for now
                        return redirect()->to(base_url('dashboard'));
                    }

                } else {
                    session()->setFlashdata('notif_error', '<b>Your ID or Password is Wrong !</b> ');
                    return redirect()->to(base_url());
                }
            } else {
                session()->setFlashdata('notif_error', '<b>Your ID or Password is Wrong!</b> ');
                return redirect()->to(base_url());
            }
        }
    }

    public function logout()
    {
        session()->destroy(); 
        return redirect()->to(base_url('/'));
    }

    public function forbiddenPage() {
        return redirect()->to(base_url('unauthorized'));
    }

    public function register()
    {
        return view('pages/commons/register');
    }

    public function registration()
    {
        if (!$this->validate([
            'inputEmail'     => ['label' => 'Email', 'rules' => 'is_unique[users.username]'],
            'inputPassword'  => ['label' => 'Password', 'rules' => 'required'],
            'inputPassword2' => ['label' => 'Password Confirmation', 'rules' => 'matches[inputPassword]'],
        ])) {
            $data = array_merge($this->data ?? [], [
                'title'         => 'Register Page',
            ]);

            session()->setFlashdata('notif_error', $this->validator->getError('inputPassword2') . ' ' . $this->validator->getError('inputEmail'));
            return view('pages/commons/register', $data);
        } else {
            $inputFullname = htmlspecialchars($this->request->getVar('inputFullname', FILTER_UNSAFE_RAW));
            $inputEmail    = htmlspecialchars($this->request->getVar('inputEmail', FILTER_UNSAFE_RAW));
            $inputPassword = htmlspecialchars($this->request->getVar('inputPassword', FILTER_UNSAFE_RAW));
            
            // NEW FIX: Dynamically fetch the 'Student' role ID from the database.
            // This prevents Foreign Key errors if you ever delete and recreate roles!
            $db = \Config\Database::connect();
            $studentRole = $db->table('roles')->like('name', 'student', 'both')->get()->getRow();
            $assignedRoleId = $studentRole ? $studentRole->id : 1; // Fallback to 1 if no student role exists
            
            $dataUser      = [
                'fullname' => $inputFullname,
                'username' => $inputEmail,
                'password' => password_hash($inputPassword, PASSWORD_DEFAULT),
                'role_id'  => $assignedRoleId 
            ];
            
            $userModel = new UserModel();
            $userModel->insert($dataUser);
            
            session()->setFlashdata('notif_success', '<b>Registration Successfully!</b> Please login with your account.');
            return redirect()->to(base_url('login'));
        }
    }
}