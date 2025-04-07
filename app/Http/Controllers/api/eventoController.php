<?php

namespace App\Http\Controllers\api;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventoResource;

class eventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evento = evento::all();

        return EventoResource::collection($evento);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        try {
           $evento = new Evento();

           $evento-> NOMBRE = $request->input('Nombre');
           $evento-> DESCRIPCION = $request->input('Descripcion');
           $evento-> FECHA = $request->input('Fecha');
           $evento-> HORA = $request->input('Hora');
           $evento-> LUGAR = $request->input('Lugar');
           $evento-> AFORO = $request->input('Aforo');
           $evento-> ESTADO = $request->input('Estado');
           $evento-> UBICACION = $request->input('Ubicacion');
           $evento-> ID_ORGANIZADOR = $request->input('Id_Organizador');
           $evento-> save();

           return response()->json(['message' => 'Evento creado correctamente'], 201);

        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al crear evento'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
