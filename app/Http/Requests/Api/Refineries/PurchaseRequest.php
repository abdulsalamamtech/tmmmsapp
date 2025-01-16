<?php

namespace App\Http\Requests\Api\Refineries;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'supplier_id' => ['required','integer','exists:suppliers,id'],
            'purchase_date' => ['required','date'],
            'added_by' => ['required','integer','exists:users,id'],
            'comment' => ['nullable','string','max:255']
        ];
    }
}
