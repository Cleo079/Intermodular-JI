@extends('layouts.principal')

@section('titulo', 'Crear_Feria')

@section('contenido')
<div>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 350px;">
            <h3 class="text-center mb-4">Feria</h3>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Introdzca nombre de feria">
                </div>
                <div class="mb-3">
                    <label for="textarea" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="textarea" rows="3" placeholder="Descripcion feria..."></textarea>
                </div>
                <div class="mb-3">
                    <label for="fehcaFeria" class="form-label">Fecha</label>
                    <input class="form-control" type="date" id="fehcaFeria">
                </div>
                <div class="mb-3">
                    <label for="tiempo" class="form-label">Horario</label>
                    <input type="time" id="tiempo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="lugart" class="form-label">Lugar</label>
                    <input type="text" id="lugart" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="aforo" class="form-label">Aforo</label>
                    <input type="number" id="aforo" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicacion</label>
                    <input type="text" id="ubicacion" class="form-control">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
