@extends('theme.backoffice.layouts.admin')
@section('title', $user->name)
@section('head')
@endsection
@section('breadcrumbs')
    <li> <a href="{{ route('backoffice.user.index') }}">Usuarios del sistema</a></li>
    <li>{{ $user->name }}</li>
@endsection
@section('dropdown_settings')
    <li> <a href="{{ route('backoffice.user.edit', $user) }}" 
            class="grey-text text-darken-2">Editar usuario</a></li>
@endsection
@section('content')
<div class="section">
    <p class="caption"><strong>Usuario:</strong> {{ $user->name }}</p>
    <div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
            <div class="col s12 m8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"> {{ $user->name }}</span>
                        <p><strong>Edad: </strong>{{ $user->age() }}</p>
                        <!-- <h4>Roles: </h4>
                        <ul>
                            @foreach($user->roles as $role)
                                <li>{{ $role->name }}</li>
                            @endforeach
                        </ul> -->
                    </div>
                    <div class="card-action">
                        <a href="{{ route('backoffice.user.edit', $user) }}">EDITAR</a>
                        <a href="#" style="color:red" onclick="enviar_formulario()">ELIMINAR</a>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                @include('theme.backoffice.pages.user.includes.user_nav')
            </div>
        </div>
    </div>
</div>
<form method="post" action="{{ route('backoffice.user.destroy', $user) }}" name="delete_form">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
@endsection

@section('foot')
<script>
function enviar_formulario() {
    swal({
        title: 'Desea eliminar este usuario?',
        text: 'Esta acción no se puede deshacer',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, continuar',
        cancelButtonText: 'No, cancelar',
    }).then((result) => {
        if (result.value) {
            document.delete_form.submit();
        } else {
            swal(
                'Operación cancelada',
                'Registro no eliminado',
                'error'
            )
        }
    });
}
</script>
@endsection