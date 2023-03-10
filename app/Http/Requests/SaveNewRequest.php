<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveNewRequest extends FormRequest
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
            'img'=>[$this->route('noticia') ? 'nullable' : 'required','image','dimensions:min_width=500,height:300','max:2000'],
            'title'=>['required','string'],
            'content'=> 'required|max:400'
        ];
    }
}
