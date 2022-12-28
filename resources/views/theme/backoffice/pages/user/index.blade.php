@extends('theme.backoffice.layouts.admin')

@section('title', 'Usuarios del sistema')

@section('head')
@endsection

@section('breadcrumbs')
    <li> <a href="">Usuario del sistema</a></li>
@endsection

@section('dropdown_settings')
    <li> <a href="" class="grey-text text-darken-2">Crear usuario</a></li>
@endsection

@section('content')
<div class="section">
    <p class="caption">Usuarios del sistema</p>
    <div class="divider"></div>
    <div id="basic-form" class="section">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                    <table>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Correo</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="{{ route('backoffice.role.show', $role) }}">{{ $role->name }}</a></td>
                                        <td>{{ $role->slug }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td><a href="{{ route('backoffice.role.edit', $role) }}">Editar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
@endsection