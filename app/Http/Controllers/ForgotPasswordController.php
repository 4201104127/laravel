<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests\RequestResetPassword;

class ForgotPasswordController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getResetPassword()
    {
        return view('auth.passwords.email');
    }

    public function sendCodeResetPassword(Request $request)
    {
       $email = $request->email;
       $checkUser = User::where('email', $email)->first();
       if (!$checkUser)
       {
           return redirect()->back()->with('danger', 'Email không tồn tại');
       }
       $code = md5(time().$email);
       $checkUser->code = $code;
       $checkUser->time_code = Carbon::now();
       $checkUser->save();
       $data = [
           'code' => $code,
       ];
        Mail::send('email.reset_password', $checkUser->toArray(), function($message) use ($checkUser){
            $message->to($checkUser->email, 'Visitor')->subject('Lấy lại mật khẩu!');
        });
       return redirect()->route('get.code.password',['email'=>$email])->with('success','Vui lòng kiểm tra Email');
    }

    public function getCodeResetPassword()
    {
        return view('auth.passwords.code');
    }

    public function setCodeResetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $checkCode = User::where('code', $code)->where('email', $email)->first();
        if (!$checkCode)
        {
            return redirect()->back()->with('danger', 'Sai mã');
        }
        return redirect()->route('get.password',['email'=>$email, 'code'=>$code]);
    }
    public function getPassword()
    {
        return view('auth.passwords.reset');
    }

    public function setPassword(RequestResetPassword $requestResetPassword)
    {
        $code = $requestResetPassword->code;
        $email = $requestResetPassword->email;
        $check = User::where(['email'=>$email, 'code'=>$code])->first();
        if (!$check)
        {
            return redirect()->back()->with('danger', 'Có lỗi');
        }
        $check->password = bcrypt($requestResetPassword->password);
        $check->save();
        return redirect()->route('get.login')->with('success','Thay đổi mật khẩu thành công!');
    }
}
