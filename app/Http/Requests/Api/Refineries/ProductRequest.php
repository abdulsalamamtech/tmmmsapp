<?php

namespace App\Http\Requests\Api\Refineries;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_type_id' => ['required','integer','exists:product_types,id'],
            'price' => ['required','numeric'],
            'status' => ['required','in:active,pending'],
        ];
    }
}
