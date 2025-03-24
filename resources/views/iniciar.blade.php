@extends('formulario')

@section('NavBar')
<pepe>

</pepe>
@endsection
<div>
<div class="d-flex justify-content-center align-items-center vh-100">


    <div class="card p-4 shadow-lg" style="width: 350px;">
        <h3 class="text-center mb-4">Registrarse</h3>
        <form>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Introduce tu nombre">
            </div>
            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Introduce tu contraseña">
            </div>
            <!-- Tipo de usuario -->
            <div class="mb-3">
                <label for="tipoUsuario" class="form-label">Tipo de usuario</label>
                <select class="form-select" id="tipoUsuario">
                    <option value="espectador">Espectador</option>
                    <option value="feriante">Feriante</option>
                </select>
            </div>
            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Registrarse</button>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>

            </div>
        </form>
    </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</div>
@section(section: 'iniciar')
