@extends('theme.backoffice.layouts.admin')
@section('title', 'Editar permiso  ' . $permission->name)
@section('head')
@endsection
@section('breadcrumbs')
<li>Editar permiso  {{ $permission->name }}</li>
@endsection
@section('content')
<div class="section">
    <p class="caption">Introduce los datos para editar permiso</p>
    <div class="divider"></div>
    <div class="section">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Editar permiso</span>
                        <div class="row">
                            <form class="col s12" method="post" 
                                    action="{{ route('backoffice.permission.update', $permission) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT' )}}
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" 
                                            name="name" value="{{ $permission->name }}">
                                        <label for="name">Nombre del permiso</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color:red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select name="role_id">
                                            <option value="{{ $permission->role->id }}" 
                                                    selected="">{{ $permission->role->name }}</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id}}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color:red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description" class="materialize-textarea"
                                            name="description">{{ $permission->description }}</textarea>
                                        <label for="description">Descripci??n del permiso</label>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color:red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right" 
                                                type="submit"> Actualizar
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
@endsection