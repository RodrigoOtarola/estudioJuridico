<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTeamRequest extends FormRequest
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
            //para subir png, jpeg, bmp, gif, svg o webp, con mime:jpeg,png se puede pasar los tipos de formato.
            'image'=>[$this->route('team') ? 'nullable' : 'required','image','dimensions:min_width=300,height:300','max:2000'],
            'name'=>['required','string'],
            'first_name'=> ['required','string'],
            'description'=>['required','string']
        ];
    }
}
