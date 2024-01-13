<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|min:1|max:50|string',
            'last_name' => 'required|min:1|max:50|string',
            'address' => 'required|min:1|max:255',
            'cell_no' => 'required|min:1|max:255'
        ];
    }
}
