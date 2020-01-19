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
    public function scopeTipoincidencia($query,$tipoincidencia){
        if($tipoincidencia!=null)
            return $query->Where('tipoincidencia','=', "$tipoincidencia");

    }

    public function scopeEstado($query,$estado){
        if($estado!=null)
            return $query->Where('estado','=', "$estado");

    }

    public function scopeCliente($query,$cliente){
        if($cliente!=null)
            return $query->Where('$Cliente_id','=', "$cliente");

    }

    public function scopeOperador($query,$operador){
        if($operador!=null)
            return $query->Where('$Operador_id','=', "$operador");

    }

    public function scopeTecnico($query,$tecnico){
        if($tecnico!=null)
            return $query->Where('$Tecnico_id','=', "$tecnico");

    }





}
