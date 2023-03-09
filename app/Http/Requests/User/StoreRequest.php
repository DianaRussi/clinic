<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('create', User::class);
    }

    public function rules()
    {
        return [
            'role' =>'required|numeric',
            'name'=>'required|string|max:255',
            'dob'=>'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    public function messages(){
        return[
            'role.required' => 'El campo rol es requerido.',
            'role.numeric' => 'El valor no es correcto.',
            'name.required' => 'El campo de nombre es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permiten hasta 255 caracteres.',
            'dob.required' => 'El campo fecha de nacimiento es requerido.',
            'email.required' => 'El campo correo electrónico es requerido.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo se permiten hasta 255 caracteres.',
            'email.unique' => 'Este correo ya esta registrado.',
            'password.required' => 'El campo contraseña es requerido.',
            'password.string' => 'El valor no es correcto.',
            'password.min' => 'Tu contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
