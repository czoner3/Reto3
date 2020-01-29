<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Incidencia;
use App\Tecnico;
use App\Vehiculo;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TecnicoController extends Controller
{

    public function index()
    {
     /*   if(Auth::check()==false){
            return redirect('/login');
        }*/

        $usuario=Users::find(Auth::id());

        $tecnicoid = Tecnico::select('id')->where('email', $usuario->email)->get();
        $tecnico = Tecnico::find($tecnicoid)->first();
        $incidenciaid = Incidencia::select('id')->where('estado', 1)->where('tecnico_id', $tecnico->id)->first();

        if ($incidenciaid) {
            $incidencia = Incidencia::find($incidenciaid->id);

            $clienteid = Incidencia::select('cliente_id')->where('id', $incidenciaid->id)->first();
            $cliente = Cliente::find($clienteid->cliente_id);

            $tecnicoid = Incidencia::select('tecnico_id')->where('id', $incidenciaid->id)->first();
            $tecnico = Tecnico::find($tecnicoid->tecnico_id);

            $vehiculoid = Vehiculo::select('id')->where('cliente_id', $clienteid->cliente_id)->first();
            $vehiculo = Vehiculo::find($vehiculoid->id);


            return view('tecnico', [
                "incidencia" => $incidencia,
                "cliente" => $cliente,
                "vehiculo" => $vehiculo,
                "tecnico" => $tecnico

            ]);
        } else {
            $misincidencias = Incidencia::select("*")->where('tecnico_id', $tecnico->id)->get();
            return view('misIncidencias', ["misincidencias" => $misincidencias]);
        }


     /*   $incidenciaid = Incidencia::select('id')->where('estado',1)->first();
        $incidencia = Incidencia::find($incidenciaid->id);

        $clienteid = Incidencia::select('cliente_id')->where('id',$incidenciaid->id)->first();
        $cliente = Cliente::find($clienteid->cliente_id);

        $tecnicoid = Incidencia::select('tecnico_id')->where('id',$incidenciaid->id)->first();
        $tecnico = Tecnico::find($tecnicoid->tecnico_id);

        $vehiculoid = Vehiculo::select('id')->where('cliente_id',$clienteid->cliente_id)->first();
        $vehiculo = Vehiculo::find($vehiculoid->id);




        return view('tecnico', [
            "incidencia"=> $incidencia,
            "cliente"=> $cliente,
            "vehiculo"=>$vehiculo,
            "tecnico"=>$tecnico

        ]);*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function show(Tecnico $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function edit(Tecnico $tecnico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       /* if(Auth::check()==false){
            return redirect('/login');
        }*/

        $incidencia = Incidencia::find($id);

        $incidencia->observaciones = request('observaciones');
        $incidencia->estado = request('estado');


        $tecnicoid = Incidencia::select('tecnico_id')->where('id',$incidencia->id)->first();
        $tecnico = Tecnico::find($tecnicoid->tecnico_id);

        $tecnico->estado=0;
        $tecnico->save();

        $incidencia->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tecnico  $tecnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnico $tecnico)
    {
        //
    }


}
