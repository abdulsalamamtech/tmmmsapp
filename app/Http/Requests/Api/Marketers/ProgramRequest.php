<?php

namespace App\Http\Requests\Api\Marketers;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'liters' => ['required', 'integer'],
            'purchase_id' => ['required','integer','exists:purchases,id'],
            // 'pending', 'approved', 'rejected', 'completed'
            'status' => ['nullable','in:pending,completed'],
        ];
    }

    protected function prepareForValidation()
    {  
        $this->merge([  
            'status' => $this->status ?? 'pending',  
        ]);
    }
}
