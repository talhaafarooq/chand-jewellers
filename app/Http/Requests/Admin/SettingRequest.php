<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'email' => 'required|email|max:255',
            'phone1' => 'required|max:255',
            'phone2' => 'nullable|max:255',
            'address1' => 'required|max:255',
            'address2' => 'nullable|max:255',
            'facebook' => 'nullable|max:255',
            'twitter' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'whatsapp' => 'nullable|max:255',
            'youtube' => 'nullable|max:255',
            'map' => 'nullable|max:1000',
            'header_logo' => 'nullable|mimes:jpg,jpeg,png',
            'footer_logo' => 'nullable|mimes:jpg,jpeg,png'
        ];
    }
}
