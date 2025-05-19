<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Evento;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entrada';
    public $incrementing = false; // Ya que usas clave compuesta
    public $timestamps = false;   // No usas created_at ni updated_at

    protected $fillable = ['ID_USUARIO', 'ID_EVENTO', 'FECHA_ENTRADA'];

    // Relación: esta entrada pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_USUARIO');
    }

    // Relación: esta entrada pertenece a un evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'ID_EVENTO');
    }
}
