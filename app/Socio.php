<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{   
    protected $table = "socios";
    protected $fillable = [
        'numero_socio', 'nombre', 'apellido', 'telefono', 'limite_prestamos', 'activo'
    ];

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'prestamos')->withTimestamps();
    }
}
