@extends('layout')

@section('content')


    <canvas id="myChart" height="100vh"></canvas>
    <form action="/estadisticas" method="get">
        <div class="estadisticas" class="form-group" style="width: 50%;float: left;">
            <div>
                <label for="tipochart">Tipo de incidencia:</label>
                <select class="custom-select" name="tipochart" id="tipochart">
                    <option value="0">--</option>
                    <option value="1">Tipo incidencia</option>
                    <option value="2">Por tecnicos</option>
                    <option value="3">Numero incidentes</option>
                    <option value="4">Tipo de resolucion</option>
                </select>
            </div>
        </div>


        <script>
            var myChart;

            $('#tipochart').on('change',function() {
                if(myChart !== undefined)
                    myChart.destroy();
                var option = this.value;
                var valor = 0;


                $.ajax({
                    data: option,
                    url: "/estadisticas/cargar",
                    type: "GET",
                    async: false,
                    success: function (result) {
                        /*let contenido = $("<div />").html(result).find( '#jscoche' ).html();
                        eval(contenido);*/
                        var aContadores = 0;

                        var opcion = $('#tipochart').val();
                        switch(opcion){
                            case "1":
                                tipoIncidencia(result);
                                break;
                            case "2":


                                break;
                            case "3":
                                numeroIncidenciasPorMes(result);
                                break;
                            case "4":
                                tipoResolucion(result);
                                break;
                        }

                        function tipoIncidencia(aIncidencias) {
                            var pinchazo = 0;
                            var golpe = 0;
                            var averia = 0;
                            var otro = 0;


                            for(var x = 0; x < aIncidencias.length; x++){


                                switch(aIncidencias[x]['tipoincidencia']){
                                    case 1:
                                        pinchazo++;
                                        break;
                                    case 2:
                                        golpe++;
                                        break;
                                    case 3:
                                        averia++;
                                        break;
                                    case 4:
                                        otro++;
                                        break;
                                }
                                }
                            aContadores = [pinchazo,golpe,averia,otro];
                            generarGraficoTipoIncidencia(aContadores);

                        }

                        function tipoResolucion(aResolucion) {
                            var abierta = 0;
                            var cerradagaraje = 0;
                            var cerradainsitu = 0;

                            for (var x = 0; x < aResolucion.length; x++) {


                                switch (aResolucion[x]['estado']) {

                                    case 1:
                                        abierta++;
                                        break;
                                    case 2:
                                        cerradagaraje++;
                                        break;
                                    case 3:
                                        cerradainsitu++;
                                        break;
                                }
                            }
                            aContadoresResolucion = [abierta, cerradagaraje, cerradainsitu];
                            generarGraficoTipoResolucion(aContadoresResolucion);
                        }

                        function numeroIncidenciasPorMes(aResolucion) {
                            var contadorIncidenciasPorMes = 0;

                            var enero = 0;
                            var febrero= 0;
                            var marzo = 0;
                            var abril = 0;
                            var mayo = 0;
                            var junio = 0;
                            var julio = 0;
                            var agosto = 0;
                            var septiembre = 0;
                            var octubre = 0;
                            var noviembre = 0;
                            var diciembre = 0;

                            for (var x = 0; x < aResolucion.length; x++) {

                             var mes = aResolucion[x]['created_at'];
                             var mesformated = mes.substring(5,7);


                                switch (mesformated) {

                                    case "01":
                                        enero++
                                        break;
                                    case "02":
                                        febrero++
                                        break;
                                    case "03":
                                        marzo++
                                        break;
                                    case "04":
                                        abril++
                                        break;
                                    case "05":
                                        mayo++
                                        break;
                                    case "06":
                                        junio++
                                        break;
                                    case "07":
                                        julio++
                                        break;
                                    case "08":
                                        agosto++
                                        break;
                                    case "09":
                                        septiembre++
                                        break;
                                    case "10":
                                        octubre++
                                        break;
                                    case "11":
                                        noviembre++
                                        break;

                                    case "12":
                                        diciembre++
                                        break;
                                }
                            }
                            contadorIncidenciasPorMes = [enero, febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre];
                            generarGraficoNumeroIncidenciasPorMes(contadorIncidenciasPorMes);
                        }

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(thrownError);
                        alert("wsdfdsfdsfds");
                    }
                });
            })



          function generarGraficoTipoIncidencia(aContador) {
                var cPinchazo = aContador[0];
                var cGolpe = aContador[1];
                var cAveria = aContador[2];
                var cOtro = aContador[3];

              var ctx = document.getElementById('myChart').getContext('2d');
               myChart = new Chart(ctx, {
                  type: 'doughnut',
                  data: {
                      labels: ['Pinchazo', 'Golpe', 'Averia', 'otro'],
                      datasets: [{
                          label: '# of Votes',
                          data: [cPinchazo, cGolpe,cAveria,cOtro],
                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',

                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',

                          ],
                          borderWidth: 1
                      }]
                  },
                  options: {
                      responsive: true,
                      hover: {
                          animationDuration:0
                      }


                  }

              });
          }

            function generarGraficoTipoResolucion(aContadorResolucion) {
                var cAbierto = aContadorResolucion[0];
                var cCerradoGaraje = aContadorResolucion[2];
                var cCerradoInsitu = aContadorResolucion[1];

                var ctx = document.getElementById('myChart').getContext('2d');
                 myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Abierta','Cerrada en Garaje','Cerrada Insitu'],
                        datasets: [{
                            label: '# of Votes',
                            data: [cAbierto, cCerradoGaraje,cCerradoInsitu],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',

                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',

                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        hover: {
                            animationDuration:0
                        }


                    }

                });
            }

            function generarGraficoNumeroIncidenciasPorMes(aContadorIncidenciaPorMes) {


                var ctx = document.getElementById('myChart').getContext('2d');
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                        datasets: [{
                            label: '# of Votes',
                            data: [aContadorIncidenciaPorMes[0],aContadorIncidenciaPorMes[1],aContadorIncidenciaPorMes[2],
                                   aContadorIncidenciaPorMes[3],aContadorIncidenciaPorMes[4],aContadorIncidenciaPorMes[5],
                                   aContadorIncidenciaPorMes[6],aContadorIncidenciaPorMes[7],aContadorIncidenciaPorMes[8],
                                   aContadorIncidenciaPorMes[9],aContadorIncidenciaPorMes[10],aContadorIncidenciaPorMes[11]],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',

                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',

                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        hover: {
                            animationDuration:0
                        }


                    }

                });
            }





        </script>

@endsection
<?php
/**
 * Created by PhpStorm.
 * User: msimm
 * Date: 27/01/2020
 * Time: 18:52
 */
?>

