<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png,gif',
        ];
    }
}
