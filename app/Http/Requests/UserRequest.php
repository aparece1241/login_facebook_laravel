<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
        $rules = [
            'email' => 'required|email',
            'name' => 'required|string',
            'age' => 'required|numeric',
            'password' => 'required|min:8',
            'birthday' => 'date',
            'gender' => 'required'
        ];

        return $rules;
    }
}
