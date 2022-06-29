<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'surname' => 'required',
            'first_name' => 'required',
            'email' => 'required|unique:student,email',
            'registration_number' => 'required|unique:student,registration_number',
            'password' => 'required'
        ]);

        $student = new Student();
        $student->surname = $request->surname;
        $student->first_name= $request->first_name;
        $student->registration_number = $request->registration_number;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);

        $student->save();

        return redirect()->route('student.login.index')->with('success', 'Account created you can now login.');

    }
}
