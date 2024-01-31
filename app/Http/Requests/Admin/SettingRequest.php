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
            'instagram1' => 'nullable|max:255',
            'instagram2' => 'nullable|max:255',
            'tiktok1' => 'nullable|max:255',
            'tiktok2' => 'nullable|max:255',
            'snack1' => 'nullable|max:255',
            'snack2' => 'nullable|max:255',
            'whatsapp' => 'required|max:255',
            'youtube' => 'nullable|max:255',
            'map' => 'required|max:1000',
            'header_logo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'footer_logo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'currency' => 'required|string',
            'shipping' => 'required',
            'advance_charges' => 'nullable',
            'cod' => 'required|min:1|max:255',
            'advertising' => 'required|min:1|max:1000',
        ];
    }
}
