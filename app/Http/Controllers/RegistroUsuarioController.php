<?php

namespace App\Http\Controllers;

use App\Tecnico;
use App\Users;
use Illuminate\Http\Request;

class RegistroUsuarioController extends Controller
{
    protected function store(Request $request){
        $tipo = request("tipo");
        $password = request("password");
        $password_confirmation = request("password_confirmation");

        if($tipo == 4){

            if ($password == $password_confirmation){

                $usuario = new Users();
                $usuario->nombreusu = request("nombreusu");
                $usuario->email = request("email");
                $usuario->password = request("password");
                $usuario->tipo = request("tipo");

                $usuario->save();

                $tecnico = new Tecnico();

                $tecnico->localizacion = "42.38,-2.38";
                $tecnico->estado = 0;
                $tecnico->nombre = request("nombretecnico");
                $tecnico->apellido = request("apellidotecnico");
                $tecnico->telefono = request("telefonotecnico");

                $tecnico->save();

                return view('welcome');
            }

        } else {
            if ($password == $password_confirmation) {

                $usuario = new Users();
                $usuario->nombreusu = request("nombreusu");
                $usuario->email = request("email");
                $usuario->password = request("password");
                $usuario->tipo = request("tipo");

                $usuario->save();
            }
        }
    }
}
