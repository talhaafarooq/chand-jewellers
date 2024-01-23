<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'about' => 'required|min:1|max:2000',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
