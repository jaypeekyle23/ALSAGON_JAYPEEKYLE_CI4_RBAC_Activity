<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function about()
    {
        $data = array_merge($this->data, [
            'title' => 'About Us'
        ]);
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = array_merge($this->data, [
            'title' => 'Contact Us'
        ]);
        return view('pages/contact', $data);
    }

    public function profile()
    {
        $data = array_merge($this->data, [
            'title' => 'User Profile'
        ]);
        return view('pages/profile', $data);
    }
}