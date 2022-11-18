<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'=> 'required',
            //Para que no permita ingresar el mismo email, salvo si se encuentra en el usuario que lo regitro, ver route desde la terminal
            'phone'=>'required',
            'email'=>'required|unique:users,email,'.$this->route('usuario')
        ];
    }
}
