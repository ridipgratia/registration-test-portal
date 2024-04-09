<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
class EmployeeRegistrationController extends Controller {
    public function register( Request $request ) {
        // Validate the incoming request data
        $message = [];
        $status = 400;
        $error_message = [
            'required'=>':attribute is required field',
            'email'=>':attribute is a email id type',
        ];
        $validator = Validator::make( $request->all(),
        [
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:employees',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ],
        $error_message );
        if ( $validator->fails() ) {
            array_push( $message, $validator->errors()->all() );
        } else {
            try {
                if ( Employee::where( 'emal', $request->email )->first() ) {
                    array_push( $message, 'Email id already exists !' );
                } else {
                    $employee = new Employee();
                    $employee->name = $request->name;
                    $employee->email = $request->email;
                    $employee->password = Hash::make( $request->password );
                    $employee->save();
                    array_push( $message, 'Ok !' );
                }
            } catch( Exception $err ) {
                array_push( $message, 'Sever error please try later  !' );
            }
        }
        return response()->json( [ 'status'=>$status, 'message'=>$message ] );
        // try {

        //     // If validation fails, return error response
        //     if ( $validator->fails() ) {
        //         return response()->json( [ 'errors' => $validator->errors() ], 422 );
        //     }
        //     $check = DB::table( 'employees' )
        //     ->where( 'email', $request->email )
        //     ->select( 'id' )
        //     ->get();
        //     if ( count( $check ) == 0 ) {
        //         $employee = new Employee();
        //         $employee->name = $request->name;
        //         $employee->email = $request->email;
        //         $employee->password = Hash::make( $request->password );
        //         $employee->save();
        //     } else {
        //         array_push( $message, 'Email id already exists !' );
        //     }
        // } catch( Exception $err ) {
        //     array_push( $message, 'Server error please try later !' );
        // }
        // // Create a new employee record

        // // Return success response
        // return response()->json( [ 'message' => 'Employee registered successfully' ], 200 );
    }
}
