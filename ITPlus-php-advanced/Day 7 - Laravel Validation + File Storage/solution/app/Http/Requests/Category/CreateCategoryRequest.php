<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name',
            'description' => 'required'
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
            'name.required' => 'Không được bỏ trống tên danh mục',
            'name.unique' => 'Tên danh mục không được trùng',
            'description.required' => "Không được bỏ trống tên mô tả"
        ];
    }
}
