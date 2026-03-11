<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    // 4.1 Display Profile
    public function show()
    {
        $session = session();
        $userModel = new UserModel();

        $sessionUsername = session('username'); 

        if (!$sessionUsername) {
            return redirect()->to('/login');
        }

        $user = $userModel->where('username', $sessionUsername)->first();

        if (!$user) {
            $session->destroy();
            return redirect()->to('/login');
        }

        // FIXED: Merge our user variable with the Starter Panel's global data ($MenuCategory)
        $data = $this->data ?? [];
        $data['user'] = $user;
        $data['title'] = 'My Profile';

        return view('profile/show', $data);
    }

    // 4.2 Show the Edit Form
    public function edit()
    {
        $userModel = new UserModel();
        $sessionUsername = session('username');

        if (!$sessionUsername) return redirect()->to('/login');

        $user = $userModel->where('username', $sessionUsername)->first();

        if (!$user) return redirect()->to('/login');

        // FIXED: Merge our user variable with the Starter Panel's global data ($MenuCategory)
        $data = $this->data ?? [];
        $data['user'] = $user;
        $data['title'] = 'Edit Profile';

        return view('profile/edit', $data);
    }

    // 4.3 Process the Form Submission
    public function update()
    {
        $userModel = new UserModel();
        $sessionUsername = session('username');

        // Fetch the user
        $user = $userModel->where('username', $sessionUsername)->first();

        if (!$user) return redirect()->to('/login');

        // Extract the ID
        $userId = $user['id']; 

        // 1. Set up Server-Side Validation Rules
        $rules = [
            'name'       => 'required',
            'email'      => "required|valid_email|is_unique[users.username,id,{$userId}]", 
            'student_id' => 'permit_empty',
            'course'     => 'permit_empty',
            'year_level' => 'permit_empty|is_natural_no_zero',
            'section'    => 'permit_empty',
            'phone'      => 'permit_empty',
            'address'    => 'permit_empty'
        ];

        // Run validation
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Build the array of data to update
        $updateData = [
            // FIXED: Changed 'name' to 'fullname' to match the database column
            'fullname'   => $this->request->getPost('name'),
            'username'   => $this->request->getPost('email'), 
            'student_id' => $this->request->getPost('student_id'),
            'course'     => $this->request->getPost('course'),
            'year_level' => $this->request->getPost('year_level'),
            'section'    => $this->request->getPost('section'),
            'phone'      => $this->request->getPost('phone'),
            'address'    => $this->request->getPost('address'),
        ];

        // 3. Handle the Image Upload
        $file = $this->request->getFile('profile_image');
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            
            // Validate the image file
            $imageValidationRule = [
                'profile_image' => 'is_image[profile_image]|mime_in[profile_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[profile_image,2048]'
            ];

            if (!$this->validate($imageValidationRule)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Delete the old one from the server
            if (!empty($user['profile_image']) && file_exists(FCPATH . 'uploads/profiles/' . $user['profile_image'])) {
                unlink(FCPATH . 'uploads/profiles/' . $user['profile_image']);
            }

            // Generate a unique filename
            $ext = $file->getExtension();
            $newName = 'avatar_' . $userId . '_' . time() . '.' . $ext;
            $file->move(FCPATH . 'uploads/profiles/', $newName);

            // Add the new filename to our database update array
            $updateData['profile_image'] = $newName;
        }

        // 4. Save to the database
        $userModel->updateProfile($userId, $updateData);

        // Update the session if they changed their email
        if ($this->request->getPost('email') !== $sessionUsername) {
             session()->set('username', $this->request->getPost('email'));
        }

        // 5. Set success message and redirect
        return redirect()->to('/profile')->with('success', 'Profile updated successfully!');
    }
}