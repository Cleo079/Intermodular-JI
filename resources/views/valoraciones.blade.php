@extends('layouts.principal')
@section('titulo', 'Valorar Evento')

@section('contenido')
<div class="container mt-4">
    <h2>Valora el Evento</h2>

    <form action="{{ route('valoraciones.store') }}" method="POST">
        @csrf
        <input type="hidden" name="evento_id" value="{{ $id_evento }}">

        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea name="comentario" id="comentario" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="puntuacion" class="form-label">Puntuación (1 a 5)</label>
            <select name="puntuacion" id="puntuacion" class="form-select" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Publicar Valoración</button>
    </form>
</div>
@endsection
