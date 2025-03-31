@extends('layouts.principal')
@section('titulo', 'Usuarios')

@section('contenido')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Tipo_Usuario</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr class="{{
            $usuario->TIPO_USUARIO == 'organizador' ? 'table-danger' : (
            $usuario->TIPO_USUARIO == 'feriante' ? 'table-warning' : (
            $usuario->TIPO_USUARIO == 'expositor' ? 'table-info' : (
            $usuario->TIPO_USUARIO == 'visitante' ? 'table-success' : 'table-light'))) }}">
            <td>{{ $usuario->NOMBRE }}</td>
            <td>{{ $usuario->EMAIL }}</td>
            <td>{{ $usuario->CONTRASEÑA }}</td>
            <td>{{ $usuario->TIPO_USUARIO }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
