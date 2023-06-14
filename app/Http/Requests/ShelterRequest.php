<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShelterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:64',
        ];
    }
}
