<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Incidencia;
use App\Vehiculo;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $tipoincidencia = $request->get('tipoincidencia');
        $estado = $request->get('estado');
        $Cliente_id = $request->get('$cliente');
        $Operador_id = $request->get('$operador');
        $Tecnico_id = $request->get('$tecnico');

        //
        $incidencia = Incidencia::orderBy('id','DESC')
            ->tipoincidencia($tipoincidencia)
            ->estado($estado)
            ->cliente($Cliente_id)
            ->operador($Operador_id)
            ->tecnico($Tecnico_id)
            ->paginate(5);
        return view('incidencia', compact('incidencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            return view('formuIncidencia');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidencia = new Incidencia();

        $incidencia->tipoincidencia = request('tipoincidencia');
        $incidencia->lugar = request('lugar');
        $incidencia->observaciones = request('observaciones');
        $incidencia->estado = request('estado');
        $incidencia->dniCliente = request('dni');
        $incidencia->idUsuario = request('idUsuario');
        $incidencia->idTecnico = request('idTecnico');

        $incidencia->save();


        $cliente = new Cliente();

        $cliente->dni = request('dni');
        $cliente->nombre = request('nombre');
        $cliente->apellido = request('apellido');
        $cliente->direccion = request('direccion');
        $cliente->telefono = request('telefono');

        $cliente->save();

        $vehiculo = new Vehiculo();

        $vehiculo->matricula = request('matricula');
        $vehiculo->marca = request('marca');
        $vehiculo->modelo = request('modelo');
        $vehiculo->tipo = request('tipo');
        $vehiculo->aseguradora = request('aseguradora');
        $vehiculo->Cliente_id = request('dni');

        $vehiculo->save();

        return redirect('/');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incidencia  $incidencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        //
    }
}
