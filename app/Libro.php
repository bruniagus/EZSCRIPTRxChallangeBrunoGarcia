<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = "libros";
    protected $fillable = [
        'titulo', 'autor_id'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function inventario()
    {
        return $this->hasOne(Inventario::class);
    }

    public function socios()
    {
        return $this->belongsToMany(Socio::class, 'prestamos')->withTimestamps();
    }
}
