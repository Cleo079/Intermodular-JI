@extends('layouts.principal')

@section('titulo', 'formEventos')

@section('contenido')

    {{-- Mensaje de bienvenida --}}
    <div class="alert alert-info">
        Bienvenido, {{ auth()->user()->nombre }}
    </div>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mostrar mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario --}}
    <div class="card">
        <div class="card-body">
            <form action="{{ route('eventos.guardar') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del evento</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
                </div>

                <div class="mb-3">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="time" class="form-control" name="hora" value="{{ old('hora') }}" required>
                </div>

                <div class="mb-3">
                    <label for="lugar" class="form-label">Lugar</label>
                    <input type="text" class="form-control" name="lugar" value="{{ old('lugar') }}" required>
                </div>

                <div class="mb-3">
                    <label for="aforo" class="form-label">Aforo</label>
                    <input type="number" class="form-control" name="aforo" value="{{ old('aforo') }}" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" name="estado" required>
                        <option value="">-- Selecciona un estado --</option>
                        <option value="activa" {{ old('estado') == 'activa' ? 'selected' : '' }}>Activa</option>
                        <option value="inactiva" {{ old('estado') == 'inactiva' ? 'selected' : '' }}>Inactiva</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicación</label>
                    <input type="text" class="form-control" name="ubicacion" value="{{ old('ubicacion') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Crear evento</button>
            </form>
        </div>
    </div>

@endsection
