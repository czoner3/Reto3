@extends('layout')

@section('content')
<div class="contenedor">

<div class="row col-11 filtros">
    <form action="/incidencia" method="get">
    <div class="incidencia" class="form-group" style="">
        <div class="selection-div">
        <div class="selection">
            <label for="tipoincidencia">Tipo:</label>
            <select class="custom-select" name="tipoincidencia">
                <option value="">--</option>
                <option value="1">Pinchazo</option>
                <option value="2">Golpe</option>
                <option value="3">Avería</option>
                <option value="4">Otro</option>
            </select>
            {{--<input class="form-control" type="text" id="tipoincidencia" name="tipoincidencia">--}}
        </div>
        <div class="selection">
            <label for="estado">Estado:</label>
            <select class="custom-select" name="estado">
                <option value="">--</option>
                <option class="normal" value="1">Abierta</option>
                <option class="resuelta" value="2">Cerrada garaje</option>
                <option class="resuelta" value="3">Cerrada insitu</option>

            </select>
            {{--<input class="form-control" type="text" id="estado" name="estado">--}}
        </div>
        <div class="selection">
            <label for="cliente_id">Cliente:</label>
            <select class="custom-select" name="cliente_id">
                <option value="">--</option>
                @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->nombrecli}}</option>
                @endforeach
            </select>
            {{--<input class="form-control" type="text" id="cliente_id" name="cliente_id">--}}
        </div>
        <div class="selection">
            <label for="usuario_id">Operador:</label>
            <select class="custom-select" name="usuario_id">
                <option value="">--</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->nombreusu}}</option>
                @endforeach
            </select>
            {{--<input class="form-control" type="text" id="usuario_id" name="usuario_id">--}}
        </div>
        <div class="selection">
            <label for="tecnico_id">Tecnico:</label>
            <select class="custom-select" name="tecnico_id">
                <option value="">--</option>
                @foreach($tecnicos as $tecnico)
                    <option value="{{$tecnico->id}}">{{$tecnico->nombre . ' ' . $tecnico->apellido}}</option>
                @endforeach
            </select>
            {{--<input class="form-control" type="text" id="tecnico_id" name="tecnico_id">--}}
        </div>
        </div>
            <div class="button-div">
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-1-alpha btn-sep icon-send">Filtrar</button>
                    </div>
            </div>
                </div>
    </form>
</div>

<div class="row col-11 tabla">
    <table class="table table-inci" style="overflow-x: auto" border="1">
        <thead class="thead edited-header">
        <tr>
            <th>Tipo incidencia</th>
            <th>Estado</th>
            <th>Fecha incidencia</th>
            <th>ID Cliente</th>
            <th>Nombre cliente</th>
            <th>ID Usuario</th>
            <th>Nombre Operador</th>
            <th>ID Tecnico</th>
            <th>Nombre tecnico</th>
            <th>Observaciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incidencia as $inci)
            <tr class="brillo">
                <td>
                    @switch($inci->tipoincidencia)
                        @case(1)
                        Pinchazo
                        @break
                        @case(2)
                        Golpe
                        @break
                        @case(3)
                        Avería
                        @break
                        @case(4)
                        Otro
                        @break
                    @endswitch

                </td>

                <td>
                    @switch($inci->estado)
                        @case(1)
                        Abierta
                        @break
                        @case(2)
                        Cerrada en garaje
                        @break
                        @case(3)
                        Cerrada in situ
                        @break
                    @endswitch
                    </td>

                <td>{{$inci->created_at }}</td>

                <td>
                    {{$inci->cliente_id}}
                </td>
                <td>
                    {{ \App\Cliente::find($inci->cliente_id)->nombrecli}}
                </td>
                <td>
                    {{$inci->usuario_id}}
                </td>
                <td>
                    {{\App\Users::find($inci->usuario_id)->nombreusu}}
                </td>
                <td>
                    {{$inci->tecnico_id}}
                </td>
                <td>
                    {{\App\Tecnico::find($inci->tecnico_id)->nombre}}
                </td>
                <td>{{$inci->observaciones}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
</div>
<div class="paginacion">
{{$incidencia->links()}}
</div>

        @foreach($incidencia as $inci)

        @if($inci->estado==1)
        <script>
            $(".brillo").css("animation-name", "parpadeo-last-child");

        </script>
        @endif
        @endforeach

@endsection



