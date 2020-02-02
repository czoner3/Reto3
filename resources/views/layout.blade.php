<html>
<head>

    <title>Asistencia en Carretera - CZone</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link  rel="stylesheet" href="{{asset('css/login.css')}}">
    <link  rel="stylesheet" href="{{secure_asset('css/login.css')}}">
    <link  rel="stylesheet" href="{{asset('css/tecnico.css')}}">

    <link  rel="stylesheet" href="{{secure_asset('css/tecnico.css')}}">
    <link  rel="stylesheet" href="{{asset('css/incidenciaform.css')}}">
    <link  rel="stylesheet" href="{{asset('css/register.css')}}">
    <link  rel="stylesheet" href="{{secure_asset('css/register.css')}}">
    <link  rel="stylesheet" href="{{asset('css/incidencias.css')}}">
    <link  rel="stylesheet" href="{{secure_asset('css/incidencias.css')}}">
    <link  rel="stylesheet" href="{{secure_asset('css/estadisticas.css')}}">
    <link  rel="stylesheet" href="{{asset('css/estadisticas.css')}}">

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    {{-- ChartScript --}}


</head>
<body>
<header style="height:auto;background-color: rgba(41,165,130,0.7)";>
    <img src="https://roadside-assistance.online/img/logos/en.png" style="height: 65px;margin-left: 4%">
    <div class="dropdown" style="position:absolute;right: 5%;top: 1%;">

        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://img.icons8.com/material-rounded/24/000000/settings.png">
        </button>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <?php

            use Illuminate\Support\Facades\Auth;
            $usuario=App\Users::find(Auth::id());
            if($usuario->tipo==3){
                echo '<a class="dropdown-item" href="/create/incidencia">Generar incidencia</a>';
            }
            if($usuario->tipo==1 ||$usuario->tipo==2){
                echo '<a class="dropdown-item" href="/register">Registrar un usuario</a>';
            }
            if($usuario->tipo==1 ||$usuario->tipo==2||$usuario->tipo==3){
                echo '<a class="dropdown-item" href="/incidencia">Historico</a>';
            }
            if($usuario->tipo==1 ||$usuario->tipo==2){
                echo '<a class="dropdown-item" href="/estadisticas">Ver estadisticas</a>';
            }

        ?>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>
<div><!--class="container"-->
@yield("content")

</div>


</body>
</html>
