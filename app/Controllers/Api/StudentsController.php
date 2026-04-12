<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;

class StudentsController extends BaseController
{
    protected UserModel $userModel;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->userModel = new UserModel();
    }

    /**
     * API Endpoint: GET /api/v1/students
     * Returns a JSON list of all students.
     */
    public function index()
    {
        // Using the exact method from your StudentManagementController!
        $students = $this->userModel->where('role_id', 3)->findAll(); 

        return $this->response->setJSON([
            'status'  => 200,
            'message' => 'Students retrieved successfully',
            'data'    => $students
        ]);
    }

    /**
     * API Endpoint: GET /api/v1/students/(:num)
     * Returns a JSON object of a single student.
     */
    public function show($id = null)
    {
        // Using the exact method from your StudentManagementController!
        $student = $this->userModel->where('role_id', 3)->where('id', $id)->first();

        if (!$student) {
            return $this->response->setStatusCode(404)->setJSON([
                'status'  => 404,
                'message' => 'Student not found',
                'data'    => null
            ]);
        }

        return $this->response->setJSON([
            'status'  => 200,
            'message' => 'Student details retrieved',
            'data'    => $student
        ]);
    }
}