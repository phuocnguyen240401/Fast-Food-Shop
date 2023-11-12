<?php

namespace App\Http\Requests\Products;

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
            'name'=>'required|max:255',
            'file'=> 'required',
        ];
    }
    public function messages(){
        return [
            "name.required"=> "Vui lòng nhập tên sản phẩm ",
            "name.max"=> "Tên sản phẩm đã vượt quá 255 kí tự",
            "file.required"=> "Vui lòng chọn ảnh đại diện",
        ];

    }
}
