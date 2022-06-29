<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $remember = false;

        $field = 'registration_number';

        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }
    

        if($request->has('remember')){
            $remember = true;
        }

        if( Auth::guard('student')->attempt([$field => $request->email, 'password'=> $request->password], $remember) ){
            return redirect()->route( 'student.index' );
        }else{
            return redirect()->route('student.login.index')->with('error',' Wrong Password / Email');
        }

    }
}
