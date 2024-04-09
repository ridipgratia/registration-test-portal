<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeRegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:8',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new employee record
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->save();

        // Return success response
        return response()->json(['message' => 'Employee registered successfully'], 200);
    }
}
