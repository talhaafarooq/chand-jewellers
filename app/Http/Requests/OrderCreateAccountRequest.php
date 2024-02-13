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
            'first_name' => 'required|min:1|max:255',
            'last_name' => 'required|min:1|max:255',
            'company' => 'sometimes|max:255',
            'address1' => 'required|min:1|max:255',
            'address2' => 'sometimes|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            // 'zipcode' => 'required|min:1|max:255|string',
            'country' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'phone1' => 'required|max:255',
            'phone2' => 'sometimes|max:255',
            'order_note' => 'nullable|max:1000',
            'create_account' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'phone1.required' => 'The cell no 1 is required',
            'phone1.min' => 'The cell no 1 must be at least 1 character',
            'phone1.max' => 'The cell no 1 must be less than 225 characters',
            'phone2.min' => 'The cell no 2 must be at least 1 character',
            'phone2.max' => 'The cell no 2 must be less than 225 characters',
        ];
    }
}
