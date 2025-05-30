<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::paginate(4);

       return view('usuarios.index', compact('usuarios'));
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
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
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
    // Prevenir que un organizador se elimine a sí mismo
    if (auth()->user()->ID_USUARIO == $usuario->ID_USUARIO) {
        return redirect()->route('usuario.index')->with('error', 'No puedes borrarte a ti mismo.');
    }

    $usuario->delete();

    return redirect()->route('usuario.index')->with('success', 'Usuario eliminado correctamente.');
}

    public function login(Request $request){
        $username = $request->input('email');
        $contrasenya = $request->input('password');

        $user = Usuario::where('EMAIL', $username)->first();

        if ($user != null && Hash::check($contrasenya, $user->CONTRASEÑA)) {
            Auth::login($user);
            $response = redirect('/');
        } else {
            // $request->session()->flash('error', 'Usuari o contrasenya incorrectes');
            $response = redirect('/login')->withInput();
        }

        return $response;
    }
}
