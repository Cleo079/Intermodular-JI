@extends('layouts.principal')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
{{$estands->links()}}

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="width: 350px;">
        <h3 class="text-center mb-4">Crear Estand</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('estand.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="NombreEmpresa" class="form-label">Nombre Empresa</label>
                <input type="text" class="form-control" id="NombreEmpresa" name="NombreEmpresa" placeholder="Ingrese el nombre de la empresa" required>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" placeholder="empresa@email.com" required>
            </div>
            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="+56 9 1234 5678" required>
            </div>
            <div class="mb-3">
                <label for="Ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="Ubicacion" name="Ubicacion" placeholder="Ubicación dentro de la feria" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </form>
    </div>
</div>


<div id="app">
    <form-stand></form-stand>
</div>

@endsection
