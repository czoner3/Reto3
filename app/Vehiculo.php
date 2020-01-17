<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
