<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtikelRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required|max:1000',
            'author' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'titlenya harusnya diisi ya',
            'content.required' => 'A message is required',
        ];
    }
}
