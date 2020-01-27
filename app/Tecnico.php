<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    public function Incidencia()
    {
        return $this->hasMany('App\Incidencia');
    }
    public function Comentario()
    {
        return $this->hasMany('App\Comentario');
    }
}
