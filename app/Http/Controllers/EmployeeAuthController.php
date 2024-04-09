<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class EmployeeAuthController extends Controller {

    public function login( Request $request ) {
        $credentials = $request->only( 'email', 'password' );
        $status = 400;
        $message = [];
        $error_message = [
            'required' => ':attribute is required filed',
        ];
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ],
            $error_message
        );
        if ( $validator->fails() ) {
            $message = $validator->errors()->all();
        } else {
            try {
                if ( Auth::guard( 'employee' )->attempt( $credentials ) ) {

                    //$user = Auth::guard( 'employee' )->user();
                    //  Auth::guard( 'employee' )->login( $user );
                    $message = 'Login Successfull';
                    $status = 200;

                } else {
                    array_push( $message, 'Credential not matched' );
                }
            } catch( Exception $err ) {
                array_push( $message, 'Server error please try later ' );
            }
        }
        return response()->json( [ 'status'=>$status, 'message'=>$message ] );
        //  return response()->json( [ 'error' => 'Unauthorized' ], 401 );
    }
}
