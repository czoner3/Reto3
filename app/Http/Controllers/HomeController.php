<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $usuario=Users::find(Auth::id());

        if($usuario) {

            switch ($usuario->tipo) {
                case "1":
                    return redirect("/estadisticas");
                case "2":
                    return redirect("/estadisticas");
                case "3":
                    return redirect('/incidencia');
                case "4":
                    return redirect('/tecnico');
            }
        }
        else{
            return view('auth/login');
        }

/*     return view('home',["user"=>$usuario]);*/

    }
}
