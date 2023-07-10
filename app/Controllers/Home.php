<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function welcome()
    {
        $session = session();
        $data = [
            "username" => $session->get('username'),
            "activePage" => 'dashboard',
            "title" => 'dashboard'
        ];

        return view('home/index', $data);
    }
}
