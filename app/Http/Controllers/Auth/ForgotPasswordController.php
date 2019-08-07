<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function getResetPassword()
    {
        return view('auth.passwords.reset');
    }

}
