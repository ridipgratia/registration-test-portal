<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller {
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
            if ( Auth::guard( 'admin' )->attempt( $credentials ) ) {
                $message="Login Successfull";
                $status=200;
            } else {
                array_push($message,'Credential not matched');
            }
        }
        return response()->json( [ 'status'=>$status, 'message'=>$message ] );
    }
}
