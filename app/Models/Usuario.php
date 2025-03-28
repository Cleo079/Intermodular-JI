<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $fillable = ['NOMBRE', 'EMAIL', 'CONTRASEÑA', 'TIPO_USUARIO'];

    protected $primaryKey = 'ID_USUARIO';
    public $timestamps = false;

    // Relación 1:N con Evento (un usuario puede crear varios eventos)
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'ID_ORGANIZADOR'); // Se usa 'ID_ORGANIZADOR'
    }

    // Relación 1:N con Estand (un usuario puede tener varios estands)
    public function estands()
    {
        return $this->hasMany(Estand::class, 'ID_USUARIO'); // Se usa 'ID_USUARIO'
    }

    // Relación M:N con Notificacion
    public function notificaciones()
    {
        return $this->belongsToMany(Notificacion::class, 'notificacion_usuario');
    }

    // Relación M:N con Entrada
    public function entradas()
    {
        return $this->belongsToMany(Entrada::class, 'entrada_usuario');
    }

    // Relación M:N con Comentario
    public function comentarios()
    {
        return $this->belongsToMany(Comentario::class, 'comentario_usuario');
    }
}
