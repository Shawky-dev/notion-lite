<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CreateBoardRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'company' => 'required'
        ];
    }
}
