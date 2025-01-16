<?php

namespace App\Http\Requests\Api\Refineries;

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
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
            'refinery_id' => ['required','integer','exists:refineries,id'],
            'added_by' => ['required','integer','exists:users,id'],
            'marketer_id' => ['required','integer','exists:marketers,id'],
            'purchase_id' => ['required','integer','exists:purchases,id'],
            'atc_number' => ['required','string', 'unique:purchase,atc_number'],
            'status' => ['nullable'],
            'generated_by' => ['nullable','integer', 'exists:users,id'],
            'comment' => ['nullable'],
            // 'start_date' => ['required','date'],
            // 'end_date' => ['required','date','after:start_date'],
            // 'image' => ['nullable','image','mimes:jpeg,png,jpg']
        ];
    }
}
