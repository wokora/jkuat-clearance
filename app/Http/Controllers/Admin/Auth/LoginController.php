<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $remember = false;

        if($request->has('remember')){
            $remember = true;
        }

        if( Auth::guard('user')->attempt(['email' => $request->email, 'password'=> $request->password], $remember) ){
            return redirect()->route( 'admin.index' );
        }else{
            return redirect()->route('admin.login.index')->with('error',' Wrong Password / Email');
        }

    }
}
