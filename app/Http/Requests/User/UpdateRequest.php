<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'required|string|max:255',
            'dob'=>'required',
            'email' => 'required|string|email|unique:users,email, '. $this->route('user')->id . '|max:255',
        ];
    }
    public function messages(){
        return[
            'name.required' => 'El campo de nombre es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permiten hasta 255 caracteres.',
            'dob.required' => 'El campo fecha de nacimiento es requerido.',
            'email.required' => 'El campo correo electrónico es requerido.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo se permiten hasta 255 caracteres.',
            'email.unique' => 'Este correo ya esta registrado.',
        ];
    }
}
