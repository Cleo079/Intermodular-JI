<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = usuario::all();

        return  UsuarioResource::collection($usuario);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           $usuario = new Usuario();

           $usuario-> nombre = $request->input('Nombre');
           $usuario-> Email = $request->input('Email');
           $usuario-> contraseña = $request->input('Contrasenya');
           $usuario-> Tipo_usuario = $request->input('Tipo');


           $usuario-> save();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
