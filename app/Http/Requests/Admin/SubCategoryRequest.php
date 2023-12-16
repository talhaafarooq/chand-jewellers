<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:1|string',
            'image' => 'required_if:action,create|mimes:png,jpg,jpeg',
            'category' => 'required|integer|exists:categories,id'
        ];
    }
}
