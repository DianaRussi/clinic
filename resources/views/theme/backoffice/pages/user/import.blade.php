@extends('theme.backoffice.layouts.admin')
@section('title', 'Importar usuarios')
@section('head')
@endsection
@section('breadcrumbs')
    <li> <a href="{{ route('backoffice.user.index') }}" 
        class="grey-text text-darken-2">Usuarios del sistema</a></li>
    <li>Importar Usuario</li>
@endsection

@section('content')
    <div class="section">
        <p class="caption">Selecciona un archivo de excel</p>
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Importar usuarios</span>
                            <div class="row">
                                <form class="col s12" method="post" enctype="multipart/form-data"
                                    action="{{ route('backoffice.user.make_import') }}">
                                    {{ csrf_field() }}
                                 
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="file" name="excel" required="">
                                            @error('excel')
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