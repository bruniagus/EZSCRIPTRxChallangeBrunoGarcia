<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = "inventario";
    protected $fillable = [
        'libro_id', 'total_ejemplares', 'ejemplares_disponibles'
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
