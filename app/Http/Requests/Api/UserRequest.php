<?php

namespace App\Http\Requests\Api;

// use Illuminate\Foundation\Http\FormRequest;
use  Dingo\Api\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_dash|min:6',
            // 'captcha'   => 'required',
            // 'key'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => '用户名不能为空',
            'name.unique:users'     => '用户已存在',
            'name.max:20'           => '用户名过长',
            'email.required'        => '邮箱不能为空',
            'email.email'           => '邮箱格式不正确',
            'email.unique:users'    => '邮箱已存在',
            'password.required'     => '密码不能为空',
            'password.min:6'        => '密码不能小于6位数',
            // 'captcha.required'      => '图形验证码不为空!',
            // 'key.required'          => 'key不为空'
        ];
    }
}
