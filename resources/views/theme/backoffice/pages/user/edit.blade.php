@extends('theme.backoffice.layouts.admin')
@section('title', 'Editar '. $user->name)
@section('head')
@endsection
@section('breadcrumbs')
    <li> <a href="{{ route('backoffice.user.index') }}" 
        class="grey-text text-darken-2">Usuarios del sistema</a></li>
    <li>Editar {{ $user->name }}</li>
@endsection
@section('content')
    <div class="section">
        <p class="caption">Actualiza los datos del usuario</p>
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Editar usuario</span>
                            <div class="row">
                                <form class="col s12" method="post" 
                                    action="{{ route('backoffice.user.update', $user) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT' )}}                                 
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name="name" value="{{ $user->name }}">
                                            <label for="name">Nombre del usuario</label>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="dob" type="date" name="dob" value="{{ $user->dob->format('Y-m-d') }}">
                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="email" type="email" name="email" value="{{ $user->email }}">
                                            <label for="email">Correo Electr??nico</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $message }}</strong></span>
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