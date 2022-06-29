<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student\Student;
use App\Notifications\Student\Auth\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function reset(Request $request){

        $request->validate([
            'email' => 'required|exists:student,email'
        ]);

        $new_password = random_int(1000, 9999);

        $admin = Student::where('email', $request->email)->first();
        $admin->password = Hash::make($new_password);
        $admin->save();

        $admin->notify( new PasswordReset($new_password) );

        return redirect()->route('student.reset-password.index')->with('success', 'A new password has been sent to '.$request->email);

    }
}
