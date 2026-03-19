<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class TeacherFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the logged-in user's role is NOT 'teacher' (and let's allow admin too, just in case)
        $role = session('user')['role'];
        if ($role !== 'teacher' && $role !== 'admin') {
            return redirect()->to(base_url('unauthorized'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}