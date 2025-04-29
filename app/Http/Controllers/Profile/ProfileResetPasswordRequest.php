<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'password' => 'required|confirmed|min:8'
        ];
    }
}
