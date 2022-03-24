<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TailorRequest extends FormRequest
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
        
        $rules=[
            'name'=>'required|string',
            'email'=>'required|email|unique:users|max:30',
            'password' => 'required|min:6',
            
         
            ];
            if (in_array($this->method(), ['PUT', 'PATCH'])) {
                $rules['email'] = ['email'];
                $rules['password'] = ['nullable'];
            }

            // if (auth()->user()->admin) {
                
            //     $rules = array_merge($rules, [
            //         'user_type' => 'required|integer',
            //     ]);
            // }
        

            return $rules;
    
            
    }
}
