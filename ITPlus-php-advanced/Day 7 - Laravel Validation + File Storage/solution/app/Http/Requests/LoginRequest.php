<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Luôn luôn phải set là true
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    /**
     * Custom messages to show on screen
     *
     * @return void
     */
    public function messages()
    {
        return [
            'email.required' => 'Không được bỏ trống email',
            'email.email' => 'Bắt buộc phải là email',
            'password.required' => "Không được bỏ trống mật khẩu"
        ];
    }
}
