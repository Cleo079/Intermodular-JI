@extends('layouts.principal')
@section('titulo', 'Usuarios')

@section('contenido')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Tipo_Usuario</th>
            @if (auth()->user()->TIPO_USUARIO === 'organizador')
                <th scope="col">Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr class="{{
            $usuario->TIPO_USUARIO == 'organizador' ? 'table-danger' : (
            $usuario->TIPO_USUARIO == 'feriante' ? 'table-warning' : (
            $usuario->TIPO_USUARIO == 'expositor' ? 'table-info' : (
            $usuario->TIPO_USUARIO == 'visitante' ? 'table-success' : 'table-light'))) }}">
            <td>{{ $usuario->NOMBRE }}</td>
            <td>{{ $usuario->EMAIL }}</td>
            <td>{{ $usuario->CONTRASEÑA }}</td>
            <td>{{ $usuario->TIPO_USUARIO }}</td>

            @if (auth()->user()->TIPO_USUARIO === 'organizador')
            <td>
                @if (auth()->user()->ID_USUARIO !== $usuario->ID_USUARIO)
                <form action="{{ route('usuario.destroy', $usuario->ID_USUARIO) }}" method="POST" class="form-borrar-usuario d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                </form>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

{{ $usuarios->links() }}
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tipoUsuario = @json(auth()->user()->TIPO_USUARIO);

        if (tipoUsuario !== 'organizador') {
            document.querySelectorAll('.form-borrar-usuario').forEach(form => {
                form.style.display = 'none';
            });
        }
    });
</script>
@endpush
