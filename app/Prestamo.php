<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = ['socio_id', 'libro_id'];

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}