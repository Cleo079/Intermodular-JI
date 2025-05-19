<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['ID_EVENTO', 'ID_USUARIO', 'COMENTARIO'];


    protected $table = 'comentario';
    public $incrementing = false; // Evita que Laravel asuma un ID autoincremental
    public $timestamps = false;

    // Relación M:N con Usuario
    // public function usuarios()
    // {
    //     return $this->belongsToMany(
    //         Usuario::class,         // Modelo relacionado
    //         'comentario',   // Tabla pivote
    //         'ID_EVENTO',            // Clave foránea en la tabla pivote
    //         'ID_USUARIO'            // Clave foránea en la tabla pivote
    //     )->withPivot('ID_USUARIO', 'ID_EVENTO'); // Incluir claves primarias compuestas
    // }

     public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_USUARIO');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'ID_EVENTO');
    }


}
