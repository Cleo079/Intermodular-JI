@extends('layouts.principal')
@section('titulo', 'login')
@section('contenido')

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 350px;">
            <h3 class="text-center mb-4">Login</h3>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Introduce tu email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" placeholder="Introduce tu contraseña">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>

            </form>
        </div>
    </div>


@endsection
