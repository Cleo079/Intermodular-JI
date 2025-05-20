@extends('layouts.principal')

@section('titulo', 'Valoraciones')

@section('contenido')

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($comentarios as $comentario)
            <div class="col">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comentario->FECHA_COMENTARIO }}</h5>
                        <img src="{{ asset('imgs/iron_cross.png') }}" alt="Imagen del evento" width="200px" class="mb-3">
                        <p class="card-text">
                            <strong>Comentario:</strong> {{ $comentario->COMENTARIO }}<br>
                            <strong>Puntuacion:</strong> {{ $comentario->PUNTUACION }}<br>
                        </p>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        @endforeach
        {{ $comentarios->links() }}
    </div>

@endsection


