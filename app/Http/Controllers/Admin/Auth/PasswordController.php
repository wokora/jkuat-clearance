<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\User\User;
use App\Notifications\User\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function reset(Request $request){

        $request->validate([
            'email' => 'required|exists:user,email'
        ]);

        $new_password = random_int(1000, 9999);

        $admin = User::where('email', $request->email)->first();
        $admin->password = Hash::make($new_password);
        $admin->save();

        $admin->notify( new PasswordReset($new_password) );

        return redirect()->route('admin.login.index')->with('success', 'A new password has been sent to '.$request->email);

    }
}
