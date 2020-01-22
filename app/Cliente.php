<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function Vehiculo()
    {
        return $this->hasMany('App\Vehiculo');
    }
    public function Incidencia()
    {
        return $this->hasMany('App\Incidencia');
    }


}
