<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
        return view('home');
    }
    public function index()
    {
        return view('welcome_message');
    }
    public function login()
    {
        return view('admin/login');
    }
    // public function utilities()
    // {
    //     return view('admin/utilities');
    // }
}