<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'min:2',
            'desc' => 'required',
            'content_product' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Ten it nhat 2 ky tu',
            'image.required' => 'Anh khong duoc de trong',
            'image.image' => 'Anh khong khong dung dinh dang: jpg, jpeg, png, bmp, gif, svg, webp',
        ];
    }
}
