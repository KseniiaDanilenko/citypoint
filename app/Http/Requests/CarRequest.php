<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'RegNumber' => 'required|string|max:255',
            'Vin' => 'nullable|string|max:128',
            'Model' => 'nullable|string|max:255',
            'Brand' => 'nullable|string|max:256',
        ];
    }
}