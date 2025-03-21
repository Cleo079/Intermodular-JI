<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estand extends Model
{
    use HasFactory;

    protected $table = 'estand';
    protected $primaryKey = 'ID_ESTAND';
    public $incrementing = false;
    public $timestamps = false;

    // Relación M:N con Evento (evento_estand)
    public function eventos()
    {
        return $this->belongsToMany(
            Evento::class,
            'evento_estand',
            'ID_ESTAND',
            'ID_EVENTO'
        )->withPivot('ID_EVENTO', 'ID_ESTAND');
    }

    // Relación 1:N con Usuario (un usuario puede tener varios estands)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_USUARIO'); // Relación con 'ID_USUARIO'
    }
}

