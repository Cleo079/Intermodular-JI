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
                        <a href="{{ route('valoraciones.create', $evento->ID_EVENTO) }}" class="btn btn-success float-start">
                             Valoraciones
                        </a>
                        <a href="" class="btn btn-success margen">Ver Valoraciones</a>


                        @if (auth()->user()->TIPO_USUARIO == 'expositor')
                            <a href="#" class="btn btn-primary float-end">
                                Crear expositor
                            </a>
                        @elseif (auth()->user()->TIPO_USUARIO == 'visitante')
                            <a href="#" class="btn btn-success float-end">
                                Comprar entradas
                            </a>
                        @elseif (auth()->user()->TIPO_USUARIO == 'organizador')
                            <form action="{{ route('eventos.destroy', $evento->ID_EVENTO) }}" method="POST"
                                class="d-inline float-end form-borrar-evento">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-borrar">Borrar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        {{ $eventos->links() }}
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Extra: Imprimir datos en consola (debug)
        const cards = document.querySelectorAll(".card");

        cards.forEach((card, index) => {
            let datos = [];

            const nombre = card.querySelector(".card-header")?.textContent.trim();
            if (nombre) datos.push(`Nombre: ${nombre}`);

            const descripcion = card.querySelector(".card-title")?.textContent.trim();
            if (descripcion) datos.push(`Descripción: ${descripcion}`);

            const detalles = card.querySelector(".card-text")?.innerText.trim();
            if (detalles) datos.push(`Detalles:\n${detalles}`);

            console.log(`Evento ${index + 1}:`, datos.join("\n"));
        });

        // Mostrar botón "Borrar" solo si el usuario es organizador o feriante
        const tipoUsuario = @json(auth()->user()->TIPO_USUARIO);
        if (tipoUsuario !== 'feriante' && tipoUsuario !== 'feriante') {
            document.querySelectorAll('.form-borrar-evento').forEach(form => {
                form.style.display = 'none';
            });
        }
    });
</script>
@endpush

