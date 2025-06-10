<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'evento';
    protected $primaryKey = 'ID_EVENTO';
    public $timestamps = false;

    // Relación M:N con Entrada
    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'ID_EVENTO');
    }

    // Relación M:N con Comentario
    public function comentarios()
    {
        return $this->belongsToMany(
            Comentario::class,
            'comentario_usuario',
            'ID_EVENTO',
            'ID_USUARIO'
        )->withPivot('ID_USUARIO', 'ID_EVENTO');
    }

    // Relación M:N con Notificacion
    public function notificaciones()
    {
        return $this->belongsToMany(
            Notificacion::class,
            'notificacion_usuario',
            'ID_EVENTO',
            'ID_USUARIO'
        )->withPivot('ID_USUARIO', 'ID_EVENTO');
    }

    // Relación M:N con Estand
    public function estands()
    {
        return $this->belongsToMany(
            Estand::class,
            'evento_estand',
            'ID_EVENTO',
            'ID_ESTAND'
        )->withPivot('ID_EVENTO', 'ID_ESTAND');
    }

    // Relación 1:N con Usuario (un usuario puede crear varios eventos)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_ORGANIZADOR'); // Ahora se usa 'ID_ORGANIZADOR'
    }
}
