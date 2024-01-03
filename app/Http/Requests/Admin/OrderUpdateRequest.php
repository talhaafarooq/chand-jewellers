<?php

namespace App\Http\Requests\Admin;

use App\Enums\OrderStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderUpdateRequest extends FormRequest
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
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|min:1|max:255',
            'address1' => 'required|string|min:1|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|min:1|max:255',
            'state' => 'required|string|min:1|max:255',
            'zipcode' => 'required|string|min:1|max:255',
            'country' => 'required|string|min:1|max:255',
            'phone1' => 'required|string|min:1|max:255',
            'phone2' => 'nullable|string|max:255',
            'status' => ['nullable','string','max:255',Rule::in(OrderStatusEnum::getValues())],
            'tracking_no' => 'nullable|string|max:255',
            'tracking_company' => 'nullable|string|max:255',
        ];
    }
}
