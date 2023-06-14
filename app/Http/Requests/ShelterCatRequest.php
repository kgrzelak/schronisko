<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShelterCatRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:64',
            'age' => 'required|integer|min:0|max:30'
        ];
    }
}
