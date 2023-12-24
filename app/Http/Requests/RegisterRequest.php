<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    // public function authorize(): bool
    // {
    //     return false;
    // }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'phone_no' => 'required|string|min:1|max:255',
            'address' => 'required|string|min:1|max:255',
            'email' => 'required|email|min:1|max:255|unique:users,email',
            'password' => 'required|string|min:1|max:255',
        ];
    }
}
