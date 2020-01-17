<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Tecnico()
    {
        return $this->belongsTo('App\Tecnico');
    }
}
