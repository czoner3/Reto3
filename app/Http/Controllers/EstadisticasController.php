<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Incidencia;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadisticasController extends Controller
{
    //
    public function index(){

        $usuario=Users::find(Auth::id());

        if($usuario->tipo=='1'||$usuario->tipo=='2') {
            return view('estadisticas');
        }
        else{
            return redirect("/");
        }
    }

    public function comprobarChart(Request $request){
     //   $option = request()->all()['option'];

        if(Auth::check()==false){
            return redirect('/login');
        }

        $incidencia = Incidencia::all();
        return $incidencia;

        }



}

