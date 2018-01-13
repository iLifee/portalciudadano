<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'titulo', 'contenido', 'autor', 'autor_corre_electronico'
    ];
}
