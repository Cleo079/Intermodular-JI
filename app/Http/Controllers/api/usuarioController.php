<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuario;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UsuarioResource;

class UsuarioController extends Controller
{
    /**
     * Muestra una lista de usuarios.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return UsuarioResource::collection($usuarios);
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        try {

            $usuario=new Usuario();

            $usuario->NOMBRE = $request->input('Nombre');
            $usuario->EMAIL = $request->input('Email');
            $usuario->CONTRASEÑA = bcrypt($request->input('Contrasenya'));
            $usuario->TIPO_USUARIO = $request->input('Tipo');
            $usuario->save();

            return response()->json(['message' => 'Usuario registrado correctamente'], 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al registrar usuario'], 500);
        }
    }

    /**
     * Muestra un usuario específico.
     */
    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }

    /**
     * Actualiza los datos de un usuario.
     */
    public function update(Request $request, Usuario $usuario)
    {
        try {
            $usuario->update($request->all());
            return response()->json(['message' => 'Usuario actualizado correctamente']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al actualizar usuario'], 500);
        }
    }

    /**
     * Elimina un usuario.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return response()->json(['message' => 'Usuario eliminado correctamente']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al eliminar usuario'], 500);
        }
    }

    /**
     * Inicia sesión un usuario.
     */
    public function login(Request $request)
{
    $usuario = Usuario::where('EMAIL', $request->input('email'))->first();

    if ($usuario && Hash::check($request->input('contrasenya'), $usuario->CONTRASEÑA)) {
        Auth::login($usuario);

        return response()->json([
            'message' => 'Login exitoso',
            'usuario' => $usuario
        ], 200);
    }

    return response()->json([
        'error' => 'Usuario o contraseña incorrectos'
    ], 401);
}


    /**
     * Cierra sesión.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
