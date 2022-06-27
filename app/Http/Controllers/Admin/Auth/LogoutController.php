<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('user')->logout();

        return redirect()->route('admin.index');

    }
}
