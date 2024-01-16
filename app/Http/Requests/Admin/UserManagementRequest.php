<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserManagementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
            'phone' => ['required', 'string', 'max:20'],
            'role' => 'required|string|exists:roles,name',
            // 'email' => 'required_if:action,create|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|max:16',
            'email' => [
                'required_if:action,create',
                'email',
                'max:255',
                Rule::unique('users'), // Assuming 'users' is the table name
                function ($attribute, $value, $fail) {
                    // Validate that the email ends with '.com'
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL) || !str_ends_with($value, '.com')) {
                        $fail("The $attribute must be a valid email address and end with '.com'");
                    }
                },
            ],
            'status'=>'required|in:0,1'
        ];
    }
}
