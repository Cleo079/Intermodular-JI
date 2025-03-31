<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Evento
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();

       return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento-> nombre = $request->input('nombre');
        $evento-> descripcion = $request->input('descripcion');
        $evento-> fecha = $request->input('fecha');
        $evento-> hora = $request->input('hora');
        $evento-> lugar = $request->input('lugar');
        $evento-> aforo = $request->input('aforo');
        $evento-> ubicacion = $request->input('ubicacion');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Evento $evento)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Evento $evento)
    // {
    //     //
    // }
}
