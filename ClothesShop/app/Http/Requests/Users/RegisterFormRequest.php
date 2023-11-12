<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'email'=>'required|email:filter|unique:users,email',
            'password'=> 'required|min:6|max:20',
            'repassword'=>'required|min:6|max:20',
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Vui lòng nhập tên người dùng',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Phải nhập email',
            'email.unique'=> 'Email đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'repassword.required'=>'Vui lòng nhập mật khẩu',
            'repassword.max'=>'Mật khẩu không quá 20 kí tự',
            'repassword.min'=>'Mật khẩu không ít hơn 6 kí tự',
            'password.max'=>'Mật khẩu không quá 20 kí tự',
            'password.min'=>'Mật khẩu không ít hơn 6 kí tự',
        ];
    }
}
