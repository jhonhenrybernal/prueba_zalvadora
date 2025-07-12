<?php

namespace App\Domains\Plans\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // o lógica de autorización
    }

    public function rules()
    {
        return [
            'name'           => 'required|string|max:255',
            'monthly_price'  => 'required|numeric|min:0',
            'user_limit'     => 'required|integer|min:1',
            'features'       => 'nullable|array',
            'features.*'     => 'string'
        ];
    }
}
