<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255'
        ];
    }
}
