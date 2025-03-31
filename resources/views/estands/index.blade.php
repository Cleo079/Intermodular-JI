@extends('layouts.principal')
@section('titulo', 'Estands')

@section('contenido')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre_Empresa</th>
            <th scope="col">Contacto</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Id_Usuario</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estands as $estand)
        <tr class="table-info">
            <td>{{ $estand->NOMBRE_EMPRESA }}</td>
            <td>{{ $estand->CONTACTO }}</td>
            <td>{{ $estand->EMAIL }}</td>
            <td>{{ $estand->TELEFONO }}</td>
            <td>{{ $estand->UBICACION }}</td>
            <td>{{ $estand->ID_USUARIO }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
