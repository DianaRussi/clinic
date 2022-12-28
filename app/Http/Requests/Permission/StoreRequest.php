<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Permission;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|unique:roles|max:255',
            'description'=>'required',
            'role_id' => 'required|numeric'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'El campo de nombre es requerido',
            'name.unique' => 'Ya existe un registro con el mismo nombre',
            'description.required' => 'El campo descripción es requerido',
            'role_id.required' => 'El campo de rol es requerido',
            'role_id.numeric' => 'El formato no es correcto',
        ];
    }
}
