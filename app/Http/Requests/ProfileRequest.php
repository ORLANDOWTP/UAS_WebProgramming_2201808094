<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'email' => 'required|unique:users,email,' . Auth::user()->email . ',email|string',


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

        ];


    }
}
