<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
        //Do update có sử dụng Route model binding:
        //categories/{category} (PUT|PATCH)
        //Nên sử dụng $this->route này để lấy route model binding value ở trên
        $category = $this->route('category');
        return [
            //Phải unique nhưng ngoại trừ name của categories với id là id hiện tại
            'name' => ['required', Rule::unique('categories', 'name')->ignore($category)],
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
