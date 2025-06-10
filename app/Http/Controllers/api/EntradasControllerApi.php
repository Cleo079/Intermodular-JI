<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entrada;
use Illuminate\Support\Facades\Log;
use App\Models\Usuario;
use App\Models\Evento;

class EntradasControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $entradas = Entrada::where('ID_USUARIO', $request->user_id)
            ->with('evento')
            ->get();
            
        return response()->json($entradas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Entrada::create([
            'ID_USUARIO' => $request->user_id,
            'ID_EVENTO' => $request->event_id,
            'FECHA_ENTRADA' => now()
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
