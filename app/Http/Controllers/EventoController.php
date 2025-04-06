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
        //
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



    public function crear(){
        return view('formEventos');
    }

    public function guardar(Request $request){

        if (auth()->user()->rol !== 'feriante') {
            abort(403, 'No tienes permiso para crear eventos.');
        }

        $evento = new Evento();
        $evento->NOMBRE = $request->nombre;
        $evento->DESCRIPCION = $request->descripcion;
        $evento->FECHA = $request->fecha;
        $evento->HORA = $request->hora;
        $evento->LUGAR = $request->lugar;
        $evento->AFORO = $request->aforo;
        $evento->ESTADO = $request->estado;
        $evento->UBICACION = $request->ubicacion;
        $evento->ID_ORGANIZADOR = auth()->user()->id;
        $evento->save();

        return redirect()->route('eventos.crear')->with('success', 'Evento creado correctamente');

    }

    public function form()
    {
        // Retorna la vista formEventos.blade.php
        return view('formEventos');
    }
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
