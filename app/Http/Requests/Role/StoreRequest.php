<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Role;

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
