@extends('layouts.principal')

@section('titulo', 'Landing')

@section('contenido')
<div>
    <!-- Verificar si el usuario está autenticado -->
    @auth
        <div class="user">
            <h3 class="darkGreen">Bienvenido, {{ Auth::user()->NOMBRE ?? Auth::user()->EMAIL }}!</h3>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger mt-2">Cerrar sesión</button>
            </form>

        </div>
    @endauth
</div>

<p class="text">Si eres un fanatico de las exposiciones registrate con nosotros <br>y disfruta de una
    gran variedad de ferias que seguro te interesaran
</p>
<div class="contenedor" id="app">
    <mi-elemento></mi-elemento>

</div>



@endsection

<script src="../js/web-components.js"></script>
