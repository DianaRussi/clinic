<?php

namespace App\Http\Requests\Role;

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
            'name'=>'required|unique:roles,name,' . $this->route('role')->id . ' |max:255',
            'description'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required' => 'El campo de nombre es requerido',
            'name.unique' => 'Ya existe un registro con el mismo nombre',
            'description.required' => 'El campo descripción es requerido',
        ];
    }
}
