<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entrada';
    public $incrementing = false; // Evita que Laravel asuma un ID autoincremental
    public $timestamps = false;

    // Relación M:N con Usuario
    public function usuarios()
    {
        return $this->belongsToMany(
            Usuario::class,       // Modelo relacionado
            'entrada',    // Tabla pivote
            'ID_EVENTO',          // Clave foránea en la tabla pivote
            'ID_USUARIO'          // Clave foránea en la tabla pivote
        )->withPivot('ID_USUARIO', 'ID_EVENTO'); // Incluir claves primarias compuestas
    }
}
