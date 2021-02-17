<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name' => 'required|string|between:5,40',
            'phone'=>'required',
            'email' => 'required|unique:users,email|string',
            'password' => 'required|string|min:8|alpha_num',
            'conf_password' => 'required|same:password|string',

        ];
    }
    public function messages()
    {

        return [
            'name.required' => 'Name field must be filled',
            'name.between' => 'Name length must be between 5 to 40 characters',
            'phone.required'=>'Phone field must be filled',
            'email.required' => 'Email field must be filled',
            'email.unique' => 'Email already used',
            'password.required' => 'Password field must be filled',
            'password.min' => 'Password must at least have 8 characters',
            'password.alpha_num' => 'Password must be alphanumeric',
            'conf_password.required' => 'Confirm Password field must be filled',
            'conf_password.same' => 'Confirm Password field must the same as password',
        ];


    }
}
