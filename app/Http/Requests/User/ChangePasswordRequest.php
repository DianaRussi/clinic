<?php

namespace App\Http\Requests\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;


class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        $auth = $this->user();
        return $this->user()->can('update_password', $auth);
    }

    public function rules()
    {
        return [
            'old_password' =>[
                'required', 
                function($attribute, $value, $fail){
                    if(!Hash::check($value, $this->user()->password)){
                        $fail('Tu contraseña no coincide');
                    }
                }
            ],
            'password' => 'required|string|min:8|confirmed'
        ];
    }

    public function messages(){
        return[
            'old_password.required' => 'El campo contraseña actual es requerido..',
            'password.required' => 'El campo contraseña es requerido.',
            'password.string' => 'El valor no es correcto.',
            'password.min' => 'Tu contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
