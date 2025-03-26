@extends('layouts.principal')
@section('titulo', 'Registro')

@section('contenido')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="width: 350px;">
        <h3 class="text-center mb-4">Registrarse</h3>
        <form>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Introduce tu nombre">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Introduce tu contraseña">
            </div>
            <div class="mb-3">
                <label for="tipoUsuario" class="form-label">Tipo de usuario</label>
                <select class="form-select" id="tipoUsuario">
                    <option value="espectador">Espectador</option>
                    <option value="feriante">Feriante</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Registrarse</button>
                <a href="{{ url('formulario') }}" class="btn btn-secondary">Iniciar Sesión</a>
            </div>
        </form>
    </div>
</div>
@endsection

