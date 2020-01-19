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

    //Scope
    public function scopeEstado($query,$estado){
        if($estado)
            return $query->where('estado','=', "%estado%");

    }

    public function scopeCliente($query,$cliente){
        if($cliente)
            return $query->where('$cliente','=', "%$cliente%");

    }

    public function scopeOperador($query,$operador){
        if($operador)
            return $query->where('$operador','=', "%$operador%");

    }

    public function scopeTecnico($query,$tecnico){
        if($tecnico)
            return $query->where('$tecnico','=', "%$tecnico%");

    }





}
