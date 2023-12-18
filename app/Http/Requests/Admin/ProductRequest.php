<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|string|min:1|max:255',
            'images'=>'required|max:2048|array',
            'images.*'=>'mimes:jpg,jpeg,png',
            'category'=>'required|integer|exists:categories,id',
            'sub_category'=>'required|integer|exists:sub_categories,id',
            'old_price'=>'nullable|integer',
            'new_price'=>'required|integer',
            'net_weight'=>'required|numeric',
            'polish_weight'=>'required|numeric',
            'karats'=>'required|numeric',
            'description'=>'required|max:500',
            'details'=>'required'
        ];
    }
}
