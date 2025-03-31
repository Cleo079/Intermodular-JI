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

           $usuario-> NOMBRE = $request->input('Nombre');
           $usuario-> EMAIL = $request->input('Email');
           $usuario-> CONTRASEÑA = bcrypt($request->input('Contrasenya'));
           $usuario-> TIPO_USUARIO = $request->input('Tipo');
           $usuario-> save();

           return response()->json(['message' => 'Usuario registrado correctamente'], 201);

        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al registrar usuario'], 500);
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
