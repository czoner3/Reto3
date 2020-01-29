<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Incidencia;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    //
    public function index(){

        /*if(Auth::check()==false){
            return redirect('/login');
        }*/

        return view('estadisticas');
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

