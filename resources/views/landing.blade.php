@extends('layouts.principal')

@section('titulo', 'Landing')

@section('contenido')
<div class="majima">
    <a href="{{ url('registro') }}" class="btn btn-secondary">Registro</a>
</div>
<div class="kiryu">
    <a href="{{ url('formulario') }}" class="btn btn-secondary">Iniciar Sesión</a>
</div>
@endsection


