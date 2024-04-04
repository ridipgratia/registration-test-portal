<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['success' => true, 'redirect' => '/admin']);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['success' => true, 'redirect' => '/login']);
    }
}
