<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentInfoModel;

class StudentInfo extends BaseController
{
    // 1. READ: Fetches all students and passes the dashboard menu data
    public function index()
    {
        $model = new StudentInfoModel();
        
        // Add students to the template's existing data array
        $this->data['students'] = $model->findAll();
        
        // Pass $this->data to the view so the sidebar doesn't crash
        return view('student_view', $this->data);
    }

// 2. CREATE: Validates data, then saves to the database
    public function store()
    {
        // Define our validation rules
        $rules = [
            'name'        => 'required|min_length[3]',
            'email'       => 'required|valid_email',
            'course'      => 'required',
            'description' => 'required|min_length[5]'
        ];

        // Check if the input passes the rules
        if (!$this->validate($rules)) {
            // If it fails, send them back with the errors and their old input
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new StudentInfoModel();
        
        $data = [
            'name'        => $this->request->getPost('name'),
            'email'       => $this->request->getPost('email'),
            'course'      => $this->request->getPost('course'),
            'description' => $this->request->getPost('description'),
        ];
        
        $model->insert($data);
        
        // SUCCESS MESSAGE
        session()->setFlashdata('success', 'Student successfully added!');
        
        return redirect()->to(base_url('students'));
    }

    // 3. DELETE: Deletes a student based on their ID
    public function delete($id)
    {
        $model = new StudentInfoModel();
        $model->delete($id);
        
        // SUCCESS MESSAGE
        session()->setFlashdata('success', 'Student successfully deleted!');
        
        return redirect()->to(base_url('students'));
    }

    // 4. EDIT: Fetches a specific student and shows the edit form
    public function edit($id)
    {
        $model = new StudentInfoModel();
        
        // Find the student by their ID
        $this->data['student'] = $model->find($id);
        
        // If someone tries to edit an ID that doesn't exist
        if (!$this->data['student']) {
            session()->setFlashdata('errors', ['Student not found.']);
            return redirect()->to(base_url('students'));
        }
        
        return view('student_edit', $this->data);
    }

    // 5. UPDATE: Validates and saves the changes to the database
    public function update($id)
    {
        $rules = [
            'name'        => 'required|min_length[3]',
            'email'       => 'required|valid_email',
            'course'      => 'required',
            'description' => 'required|min_length[5]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new StudentInfoModel();
        
        $data = [
            'name'        => $this->request->getPost('name'),
            'email'       => $this->request->getPost('email'),
            'course'      => $this->request->getPost('course'),
            'description' => $this->request->getPost('description'),
        ];
        
        $model->update($id, $data);
        
        session()->setFlashdata('success', 'Student successfully updated!');
        return redirect()->to(base_url('students'));
    }
}