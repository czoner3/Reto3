<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Incidencia;
use App\Tecnico;
use App\Users;
use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $cliente_id = $request->get('cliente_id');
        $usuario_id = $request->get('usuario_id');
        $tecnico_id = $request->get('tecnico_id');
        print_r ($cliente_id);


        //
  /*      $incidencia = DB::table('incidencias')
        ->select('incidencias.*', 'users.nombreusu','tecnicos.nombretec','clientes.nombrecli')
            ->join('users', 'incidencias.Usuario_id', '=', 'users.id')
            ->join('tecnicos', 'incidencias.Tecnico_id', '=', 'tecnicos.id')
            ->join('clientes', 'incidencias.Cliente_id', '=', 'clientes.id')
            ->orderBy('id','DESC')
            ->get();*/

        $incidencia = Incidencia::orderBy('id','DESC')
            ->tipoincidencia($tipoincidencia)
            ->estado($estado)
            ->cliente_id($cliente_id)
            ->usuario_id($usuario_id)
            ->tecnico_id($tecnico_id)
            ->paginate(6);

       /* $users = DB::table('users')->where('tipo', '=' ,2);
        foreach ($users as $user) {
            echo($user->id);
        }*/
        $users = Users::all()->where('tipo','=',2);

        $tecnicos = Tecnico::all();
        $clientes = Cliente::all();

        return view('incidencia', compact('incidencia','users','tecnicos','clientes'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tecnicos = Tecnico::all();
        return view('formuIncidencia', [
            "tecnicos"=> $tecnicos,
        ]);

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
        $cliente->nombrecli = request('nombre');
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
