<?php

namespace App\Http\Controllers;

use App\Models\Estand;
use Illuminate\Http\Request;

class EstandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estands = Estand::paginate(3);

       return view('estands.index', compact('estands'));
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


            $estand = new Estand();
            $estand->NOMBRE_EMPRESA = $request->input('NombreEmpresa');
            $estand->EMAIL = $request->input('Email');
            $estand->TELEFONO = $request->input('Telefono');
            $estand->UBICACION = $request->input('Ubicacion');
            $estand->ID_USUARIO = auth()->id(); // o pon un valor fijo si estás testeando
            $estand->save();

            return redirect()->back()->with('success', 'Estand creado correctamente');


    }

    /**
     * Display the specified resource.
     */
    public function show(Estand $estand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estand $estand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estand $estand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    

public function destroy(Estand $estand)
{
    $estand->delete();

    return redirect()->route('estand.index')->with('success', 'Estand eliminado correctamente.');
}

}
