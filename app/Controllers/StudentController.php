<?php

namespace App\Controllers;

class StudentController extends BaseController
{
    public function dashboard()
    {
        // We use array_merge to combine the BaseController's master data 
        // (which includes $MenuCategory and the session user) with our page title.
        $data = array_merge($this->data, [
            'title' => 'Student Dashboard'
        ]);

        // Load the actual UI view
        return view('student/dashboard', $data);
    }
}