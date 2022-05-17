<?php

namespace App\Http\Requests;

use App\Rules\ContainUppercaseAndAtLeastOneNumber;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //Bắt buộc phải có giá trị, và phải là duy nhất trong bảng users, trong trường email
            'email' => 'required|unique:users,email',
            'name' => 'required',
            //Sử dụng array để kết nối rule có sẵn và rule tự viết
            'password' => ['min:8', new ContainUppercaseAndAtLeastOneNumber()]
        ];
    }
}
