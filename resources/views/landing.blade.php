@extends('layouts.principal')

@section('titulo', 'Landing')

@section('contenido')
<div>
    <!-- Verificar si el usuario está autenticado -->
    @auth
        <div>
            <h3>Bienvenido, {{ Auth::user()->NOMBRE ?? Auth::user()->EMAIL }}!</h3>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Cerrar sesión</button>
            </form>

        </div>
    @endauth
</div>



@endsection


