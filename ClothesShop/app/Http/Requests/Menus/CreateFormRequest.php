<?php

namespace App\Http\Requests\Menus;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'name'=>'required|unique:menus,name|max:255',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên danh mục',
            'name.unique'=>'Tên danh mục đã bị trùng',
            'name.max'=>'Tên danh mục quá 255 kí tự',
            'description.required'=>'Vui lòng nhập đầy đủ thông tin ở phần mô tả',
        ];
    }


}
