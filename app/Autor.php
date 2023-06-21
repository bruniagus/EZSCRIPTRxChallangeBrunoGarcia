<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = [
        'nombre', 'apellido'
    ];
    protected $table = "autores";
    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
