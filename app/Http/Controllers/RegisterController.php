<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class RegisterController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->save();

        if ($user->id)
        {
            $email = $user->email;
            $code = bcrypt(md5(time().$user->email));
            $url = route('confirm.register',['id' => $user->id,'code'=>$code]);
            $user->active = 0;
            $user->code_active = $code;
            $user->time_active = Carbon::now();
            $user->save();
            $data = [
                'url' => $url
            ];
            Mail::send('email.confirm_email', $data, function($message) use ($email){
                $message->to($email, 'Visitor')->subject('Xác nhận Email!');
            });
            return redirect()->route('get.login');
        }
        return redirect()->back();
    }

    public function confirmRegister(Request $request)
    {
        $code = $request->code;
        $id = $request->id;
        $checkUser = User::where([
            'code_active'   => $code,
            'id'            => $id
        ])->first();
        if (!$checkUser)
        {
            return redirect()->route('get.login')->with('danger','Đường dẫn không tồn tại!');
        }
        $checkUser->active = 1;
        $checkUser->save();
        return redirect()->route('get.login')->with('success','Xác nhận tài khoản thành công. Vui lòng đăng nhập!');
    }
}
