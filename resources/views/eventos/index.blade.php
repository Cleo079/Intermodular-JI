@extends('layouts.principal')
@section('titulo', 'Eventos')

@section('contenido')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($eventos as $evento)
            <div class="col">
                <div
                    class="card mb-3
            {{ $evento->ESTADO == 'inactiva'
                ? 'border-danger'
                : ($evento->ESTADO == 'activa'
                    ? 'border-success'
                    : 'border-secondary') }}">
                    <div
                        class="card-header
                {{ $evento->ESTADO == 'inactiva'
                    ? 'bg-danger text-white'
                    : ($evento->ESTADO == 'activa'
                        ? 'bg-success text-white'
                        : 'bg-light') }}">
                        {{ $evento->NOMBRE }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $evento->DESCRIPCION }}</h5>
                        <img src="{{ asset('imgs/iron_cross.png') }}" alt="Imagen del evento" width="200px" class="mb-3">
                        <p class="card-text">
                            <strong>Fecha:</strong> {{ $evento->FECHA }}<br>
                            <strong>Hora apertura:</strong> {{ $evento->HORA }}<br>
                            <strong>Lugar:</strong> {{ $evento->LUGAR }}<br>
                            <strong>Aforo:</strong> {{ $evento->AFORO }} <i>personas</i><br>
                            <strong>Estado:</strong> {{ ucfirst($evento->ESTADO) }}<br>
                            <strong>Ubicación:</strong> {{ $evento->UBICACION }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success float-start">
                            Valoraciones
                        </a>
                        @if (auth()->user()->TIPO_USUARIO == 'feriante')
                            <a href="#" class="btn btn-primary float-end">
                                Crear evento
                            </a>
                            {{-- Cambia 'eventos.create' por la ruta real que lleva al formulario de creación --}}
                        @elseif (auth()->user()->TIPO_USUARIO == 'visitante')
                            <a href="#" class="btn btn-success float-end">
                                Comprar entradas
                            </a>
                            {{-- Cambia 'entradas.comprar' y el parámetro por tu ruta y lógica real de compra --}}
                        @endif

                        {{-- <div class="d-flex align-items-start col-8">
                    <a href="#" class="btn btn-success">
                        Valoraciones
                    </a>
                </div> --}}
                        {{-- <div class="d-flex align-items-end col-4">
                    @if (auth()->user()->TIPO_USUARIO == 'feriante')
                        <a href="#" class="btn btn-primary">
                            Crear evento
                        </a> --}}
                        {{-- Cambia 'eventos.create' por la ruta real que lleva al formulario de creación --}}
                        {{-- @elseif (auth()->user()->TIPO_USUARIO == 'visitante')
                        <a href="#" class="btn btn-success">
                            Comprar entradas
                        </a> --}}
                        {{-- Cambia 'entradas.comprar' y el parámetro por tu ruta y lógica real de compra --}}
                        {{-- @endif --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        @endforeach
        {{ $eventos->links() }}
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Seleccionamos todas las tarjetas de evento
        const cards = document.querySelectorAll(".card");

        cards.forEach((card, index) => {
            let datos = [];

            // Nombre del evento (header)
            const nombre = card.querySelector(".card-header")?.textContent.trim();
            if (nombre) datos.push(`Nombre: ${nombre}`);

            // Descripción del evento (card-title)
            const descripcion = card.querySelector(".card-title")?.textContent.trim();
            if (descripcion) datos.push(`Descripción: ${descripcion}`);

            // Textos dentro del párrafo (card-text)
            const detalles = card.querySelector(".card-text")?.innerText
        .trim(); // innerText para conservar saltos
            if (detalles) datos.push(`Detalles:\n${detalles}`);

            console.log(`Evento ${index + 1}:`, datos.join("\n"));
        });
    });
</script>
