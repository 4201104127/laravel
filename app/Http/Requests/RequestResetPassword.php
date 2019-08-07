<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password'      => 'required|min:6',
            're_password'   => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required'     => 'Bạn chưa nhập mật khẩu',
            'password.min'          => 'Mật khẩu phải có ít nhất 6 kí tự',
            're_password.required'  => 'Bạn chưa nhập lại mật khẩu',
            're_password.same'      => 'Mật khẩu nhập lại không đúng'
        ];
    }
}
