@extends('layouts.principal')
@section('titulo', 'Eventos')

@section('contenido')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Lugar</th>
            <th scope="col">Aforo</th>
            <th scope="col">Estado</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Id_Organizador</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($eventos as $evento)
        <tr class="{{
            $evento->ESTADO == 'inactiva' ? 'table-danger' : (
            $evento->ESTADO == 'activa' ? 'table-success' : 'table-light') }}">
            <td>{{ $evento->NOMBRE }}</td>
            <td>{{ $evento->DESCRIPCION }}</td>
            <td>{{ $evento->FECHA }}</td>
            <td>{{ $evento->HORA }}</td>
            <td>{{ $evento->LUGAR }}</td>
            <td>{{ $evento->AFORO }}</td>
            <td>{{ $evento->ESTADO }}</td>
            <td>{{ $evento->UBICACION }}</td>
            <td>{{ $evento->ID_ORGANIZADOR }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

<script>
    //asegura que <table> ya existe en cuianto empieze a buscarlo
    document.addEventListener("DOMContentLoaded", () => {
        //busca todas las <tr> del <tbody> de la <table>
        const filas = document.querySelectorAll("table tbody tr");
        //recorre el indice de cada <tr>
        filas.forEach((fila, index) => {
            //dentro de cada <tr> se seleccionan todas las <td> con los datos
            const columnas = fila.querySelectorAll("td");
            //creamos un array vacio
            let datos = [];
            //recorremos cada 'col' obteniendo su '.textContent',
            // usando '.push' añadimos el nuevo elemento al array 'datos'
            //con '.trim' quitamos los espacios al inicio y final
            //y finalmente guardamos en el arreglo 'datos'
            columnas.forEach(col => {
                datos.push(col.textContent.trim());
            });
            //mostramos cada 'evento' por 'fila'
            console.log(`Evento ${index + 1}:`, datos);
        });
    });
</script>
