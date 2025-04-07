@extends('layouts.principal')
@section('titulo', 'Eventos')

@section('contenido')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Lugar</th>
            <th scope="col">Aforo</th>
            <th scope="col">Estado</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Id_Organizador</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($eventos as $evento)
        <tr class="{{
            $evento->ESTADO == 'inactiva' ? 'table-danger' : (
            $evento->ESTADO == 'activa' ? 'table-success' : 'table-light') }}">
            <td>{{ $evento->NOMBRE }}</td>
            <td>{{ $evento->DESCRIPCION }}</td>
            <td>{{ $evento->FECHA }}</td>
            <td>{{ $evento->HORA }}</td>
            <td>{{ $evento->LUGAR }}</td>
            <td>{{ $evento->AFORO }}</td>
            <td>{{ $evento->ESTADO }}</td>
            <td>{{ $evento->UBICACION }}</td>
            <td>{{ $evento->ID_ORGANIZADOR }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
