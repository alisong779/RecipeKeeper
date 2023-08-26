<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Home Page'];

        return view('home/index', $data);
    }

    public function test()
    {
        $data = ['title' => 'Test Page'];

        return view('home/test', $data);
    }
}
