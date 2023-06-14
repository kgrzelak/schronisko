<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShelterEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:64',
            'surname' => 'required|min:3|max:64',
            'employed_at' => 'nullable|date',
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'employed_at' => $this->employed_at ?? now(),
        ]);
    }
}
