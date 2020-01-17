<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Tecnico()
    {
        return $this->belongsTo('App\Tecnico');
    }
}
