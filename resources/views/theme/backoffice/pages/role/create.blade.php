@extends('theme.backoffice.layouts.admin')
@section('title', 'Crear rol')
@section('head')
@endsection
@section('breadcrumbs')
    <li> <a href="{{ route('backoffice.role.create') }}" class="grey-text text-darken-2">Roles del sistema</a></li>
    <li>Crear rol</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Introduce los datos para crear un nuevo rol</p>
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Crear rol</span>
                            <div class="row">
                                <form class="col s12" method="post" 
                                    action="{{ route('backoffice.role.store') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name="name">
                                            <label for="name">Nombre del rol</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                               
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="description" class="materialize-textarea" 
                                                name="description"></textarea>
                                            <label for="description">Descripci??n del rol</label>
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
                                                    type="submit"> Guardar
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