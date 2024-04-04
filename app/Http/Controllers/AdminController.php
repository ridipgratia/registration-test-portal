<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suppport\Facades\Auth;


class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::guard('admin')->attempt($credentials)) {
            //authentication passed
            return redirect()->intended('/admin/home');
        }
            return redirect('/admin/login')->with('error', 'Invalid Credentials');  //authentication failed
    }

}
