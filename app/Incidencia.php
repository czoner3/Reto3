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

    public function scopeCliente_id($query,$cliente_id){

        if($cliente_id!=null)
            return $query->Where('Cliente_id','=', "$cliente_id");

    }

    public function scopeUsuario_id($query,$usuario_id){
        if($usuario_id!=null)
            return $query->Where('Usuario_id','=', "$usuario_id");

    }

    public function scopeTecnico_id($query,$tecnico_id){
        if($tecnico_id!=null)
            return $query->Where('Tecnico_id','=', "$tecnico_id");

    }





}
