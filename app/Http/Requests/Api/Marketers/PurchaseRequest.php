<?php

namespace App\Http\Requests\Api\Marketers;

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
            // 'refinery_id' => ['required', 'exists:refinery,id'],
            // 'added_by' => ['required','integer','exists:users,id'],
            'product_id' => ['required','integer','exists:products,id'],
            // 'amount' => ['required','integer'],
            'liters' => ['required','integer'],
            // 'marketer_id' => ['required','integer','exists:users,id'],
            // 'pfi_number',
        ];
    }
}
