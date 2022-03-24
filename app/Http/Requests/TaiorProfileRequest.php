<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaiorProfileRequest extends FormRequest
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
            'name' => 'string',
            'phone' => 'required',
            'location' => 'required|min:2',
            'experience' => 'required',
            'specialist' => 'required',
            'image' => 'nullable',
            'description' => 'string|required|min:10'
        ];
        return $rules;
    }
}
