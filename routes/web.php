<?php


use App\Models\Usuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstandController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\UsuarioController;
use App\Models\EventoApp\Http\Middleware\EsFeriante;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/registro', function () {
    return view('registro');
});
Route::get('/usuario', function () {
    return view('usuarios.index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/feriaregister', function () {
    return view('feria');
});

// Route::middleware(['auth', 'EsFeriante'])->group(function() {
//     Route::get('crear-evento', [EventoController::class, 'crear'])->name('eventos.crear');
//     Route::post('guardar-evento', [EventoController::class, 'guardar'])->name('eventos.guardar');
// });



// Route::get('formEvento', [EventoController::class, 'form'])->name('evento.form');
Route::resource('usuario', UsuarioController::class);
Route::resource('evento', EventoController::class);
Route::resource('estand', EstandController::class);
Route::post('/login', [UsuarioController::class, 'login'])->name('iniciar');
