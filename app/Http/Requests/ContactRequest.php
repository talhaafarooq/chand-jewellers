<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    // public function authorize(): bool
    // {
    //     return false;
    // }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'email' => 'required|email|min:1|max:255',
            'subject' => 'required|string|min:1|max:255',
            'message' => 'required|string|min:1'
        ];
    }
}
