<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => "required|numeric|min:0",
            'inventory' => "required|integer|min:0",
            'category_id' => "required",
            'description' => "nullable|string",
            'images.*' => "nullable|image|mimes:png,jpg,jpeg,webp|max:4096"

        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'نام دسته بندی را وارد کنید',
            'price.required' => 'قیمت را وارد کنید'
        ];
    }

}
