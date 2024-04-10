<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.employeehome');
    }
    public function showLoginForm()
    {
        return view('employee_login');
    }
    public function showRegistrationForm()
    {
        return view('employee_registration');
    }



}
