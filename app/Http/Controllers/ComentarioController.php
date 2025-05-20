<?php

namespace App\Http\Controllers;

use App\Models\comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $comentarios = Comentario::paginate(4);

       return view('valoraciones.index', compact('comentarios'));
    }

    /**
     * Show the form for creating a new resource.
     */public function create($id_evento)
{
    return view('valoraciones', ['id_evento' => $id_evento]);
}


   public function store(Request $request)
{
    $request->validate([
        // 'evento_id' => 'required|integer|exists:eventos,ID_EVENTO',
        // 'comentario' => 'required|string',
        // 'puntuacion' => 'required|integer|min:1|max:5',
    ]);

    comentario::create([
        'ID_EVENTO' => $request->evento_id,
        'ID_USUARIO' => Auth::id(), // suponiendo que hay relación con usuarios
        'COMENTARIO' => $request->comentario,
        'PUNTUACION' => $request->puntuacion,
    ]);

    return redirect()->route('evento.index')->with('success', '¡Valoración publicada correctamente!');
}

    /**
     * Display the specified resource.
     */
    public function show(comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comentario $comentario)
    {
        //
    }
}
