<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suppport\Facades\Auth;


class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }


}
