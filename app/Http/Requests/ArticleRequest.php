<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title'=>'required',
            'category'=>'required',
            'photo'=>'image',
            'desc'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Title field must be filled',
            'category.requierd'=>'Category must be choosen',
            'photo'=>'Photo must be an image',
            'desc'=>'Story field must be filled'
        ];
    }
}
