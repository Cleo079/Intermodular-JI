<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'ID_USUARIO';
    public $timestamps = false;

    // Asegurar que estos campos pueden ser asignados masivamente
    protected $fillable = ['NOMBRE', 'EMAIL', 'CONTRASEÑA', 'TIPO_USUARIO'];

    // Ocultar contraseña al serializar
    protected $hidden = ['CONTRASEÑA'];

    // Mutator para encriptar la contraseña automáticamente
    public function setContraseñaAttribute($value)
    {
        $this->attributes['CONTRASEÑA'] = bcrypt($value);
    }

    // Relación 1:N con Evento (un usuario puede crear varios eventos)
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'ID_ORGANIZADOR');
    }

    // Relación 1:N con Estand (un usuario puede tener varios estands)
    public function estands()
    {
        return $this->hasMany(Estand::class, 'ID_USUARIO');
    }

    // Relación M:N con Notificacion
    public function notificaciones()
    {
        return $this->belongsToMany(Notificacion::class, 'notificacion_usuario')
                    ->withPivot('leida') // Si la tabla intermedia tiene más columnas
                    ->withTimestamps();  // Si tiene timestamps
    }

    // Relación M:N con Entrada
    public function entradas()
    {
        return $this->belongsToMany(Entrada::class, 'entrada_usuario')->withTimestamps();
    }

    // Relación M:N con Comentario
    public function comentarios()
    {
        return $this->belongsToMany(Comentario::class, 'comentario_usuario')->withTimestamps();
    }
}
