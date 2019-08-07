<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogin()
    {
        if (get_data_user('web') != null)
        {
            return redirect()->back();
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email','password');
        if (\Auth::attempt($credentials))
        {
            return redirect()->route('home');
        }
        return redirect()->back()->with('danger','Đăng nhập thất bại');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
