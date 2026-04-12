<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = array_merge($this->data, [
            'title'         => 'Dashboard Page'
        ]);
        return view('pages/commons/dashboard', $data);
    }

    // Add this right below the index method!
    public function unauthorized()
    {
        $data = array_merge($this->data, [
            'title'         => 'Access Denied'
        ]);
        return view('pages/commons/unauthorized', $data);
    }
}