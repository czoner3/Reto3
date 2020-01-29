<?php

namespace App\Http\Controllers;

use App\Tecnico;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroUsuarioController extends Controller
{
    protected function store(Request $request){

       /* if(Auth::check()==false){
            return redirect('/login');
        }*/

        $tipo = request("tipo");
        $password = request("password");
        $password_confirmation = request("password_confirmation");

        if($tipo == 4){

            if ($password == $password_confirmation){

                $usuario = new Users();
                $usuario->nombreusu = request("nombreusu");
                $usuario->email = request("email");
                $usuario->password = Hash::make(request("password"));
                $usuario->tipo = request("tipo");

                $usuario->save();

                $tecnico = new Tecnico();

                $tecnico->localizacion = request("localizaciontecnico");
                $tecnico->estado = 0;
                $tecnico->email = request("email");
                $tecnico->nombre = request("nombretecnico");
                $tecnico->apellido = request("apellidotecnico");
                $tecnico->telefono = request("telefonotecnico");

                $tecnico->save();

            }

        } else {
            if ($password == $password_confirmation) {

                $usuario = new Users();
                $usuario->nombreusu = request("nombreusu");
                $usuario->email = request("email");
                $usuario->password =  Hash::make(request("password"));
                $usuario->tipo = request("tipo");

                $usuario->save();
            }
        }
        return redirect('/');
    }
}
