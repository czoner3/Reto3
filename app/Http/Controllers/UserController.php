<?php
namespace App\Http\Controllers;

use App\Cliente;
use App\Incidencia;
use App\Tecnico;
use App\Vehiculo;
use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario=Users::find(Auth::id());
        if($usuario) {
            $idusuario = $usuario->id;

            switch ($usuario->tipo) {
                case "1":
                    return view("estadisticas");
                    break;
                case "2":
                    return view("estadisticas");
                    break;
                case "3":
                    $tipoincidencia = $request->get('tipoincidencia');
                    $estado = $request->get('estado');
                    $cliente_id = $request->get('cliente_id');
                    $usuario_id = $request->get('usuario_id');
                    $tecnico_id = $request->get('tecnico_id');

                    $incidencia = Incidencia::orderBy('id', 'DESC')
                        ->tipoincidencia($tipoincidencia)
                        ->estado($estado)
                        ->cliente_id($cliente_id)
                        ->usuario_id($usuario_id)
                        ->tecnico_id($tecnico_id)
                        ->paginate(6);

                    $users = Users::all()->where('tipo', '=', 2);

                    $tecnicos = Tecnico::all();
                    $clientes = Cliente::all();

                    return view('incidencia', compact('incidencia', 'users', 'tecnicos', 'clientes'));
                    break;
                case "4":
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
                        $misincidencias = Incidencia::select("*")->where("tecnico_id", $idusuario)->get();
                        return view('misIncidencias', ["misincidencias" => $misincidencias]);
                    }
                    break;
            }
        }
        else{
            return view('auth/login');
        }
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
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
