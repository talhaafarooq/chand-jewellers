<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateAccountRequest extends FormRequest
{
    // public function authorize(): bool
    // {
    //     return false;
    // }

    public function rules(): array
    {
        return [
            'first_name' => 'required|min:1|max:255|string',
            'last_name' => 'required|min:1|max:255|string',
            'company' => 'nullable|min:1|max:255|string',
            'address1' => 'required|min:1|max:255|string',
            'address2' => 'nullable|min:1|max:255|string',
            'city' => 'required|min:1|max:255|string',
            'state' => 'required|min:1|max:255|string',
            'zipcode' => 'required|min:1|max:255|string',
            'email' => 'required|min:1|max:255|email|unique:users,email',
            'phone1' => 'required|min:1|max:255|string',
            'phone2' => 'nullable|min:1|max:255|string',
            'order_note' => 'nullable|min:1|max:500|string',
            'create_account'=>'nullable'
        ];
    }
}
