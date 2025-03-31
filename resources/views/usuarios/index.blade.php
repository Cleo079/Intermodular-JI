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
        <tr>
            <td>{{ $usuario->NOMBRE }}</td>
            <td>{{ $usuario->EMAIL }}</td>
            <td>{{ $usuario->CONTRASEÑA }}</td>
            <td>{{ $usuario->TIPO_USUARIO }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
