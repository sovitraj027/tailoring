<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClothRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules= [
            'name' => 'required|string',
            'image' => 'image',
            'description' => 'required|string',
            'type' => 'required|string',
            'brand' => 'required|string',
            'price'=>'required|integer'
        ];
        return $rules;
    }
}
