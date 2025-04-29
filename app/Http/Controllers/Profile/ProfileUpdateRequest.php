<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id() //excludes the current user email if he doesn't want to change it,
        ];
    }
}
