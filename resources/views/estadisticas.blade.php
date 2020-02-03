@extends('layout')

@section('content')

<div class="contenedor-principal-chart">
    <div class="quesito-datos">
    <div class="quesito">
        <h4>Tipo de incidencias totales:</h4>
         <canvas id="myChart1" height="190%"></canvas>
    </div>
        <div class="datos1">
            <h4 style="color:#5eb953" id="total4"></h4>
            <h4 id="titulo4"></h4>
            <canvas id="myChart4" height="145%"></canvas>

        </div>

    </div>

    <div class="barra-y-grafico">
    <div class="barras">

        <h3 id="titulo2"></h3>
         <canvas id="myChart2" height="125%"></canvas>
    </div>

    <div class="grafico">
        <h3 style="color: #5eb953" id="total1"></h3>
        <h3 id="titulo1"></h3>
        <canvas id="myChart3" height="125%"></canvas>
    </div>
    </div>
</div>
<form action="/estadisticas" method="get"></form>


        <script>
            var myChart1;
            var myChart2;
            var myChart3;
            var myChart4;


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

                                tipoIncidencia(result);
                                numeroIncidenciasPorMes(result);
                                tipoResolucion(result);
                                resueltasPorAño(result);




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
                        function resueltasPorAño(aResolucion) {
                            var mediaporaño = 0;

                            var d10 = 0
                            var d11 = 0
                            var d12 = 0
                            var d13 = 0
                            var d14 = 0
                            var d15 = 0
                            var d16 = 0
                            var d17 = 0
                            var d18 = 0
                            var d19 = 0
                            var d20 = 0



                            for (var x = 0; x < aResolucion.length; x++) {

                                var año = aResolucion[x]['created_at'];
                                var añoformated = año.substr(0, 4);


                                switch (añoformated) {

                                    case "2010":
                                        d10++
                                        break;
                                    case "2011":
                                        d11++
                                        break;
                                    case "2012":
                                        d12++
                                        break;
                                    case "2013":
                                        d13++
                                        break;
                                    case "2014":
                                        d14++
                                        break;
                                    case "2015":
                                        d15++
                                        break;
                                    case "2016":
                                        d16++
                                        break;
                                    case "2017":
                                        d17++
                                        break;
                                    case "2018":
                                        d18++
                                        break;
                                    case "2019":
                                        d19++
                                        break;
                                    case "2020":
                                        d20++
                                        break;

                                }
                            }
                            contadorIncidenciasPorDecada = [d10,d11,d12,d13,d14,d15,d16,d17,d18,d19,d20];
                            var totaldecada = d10+d11+d12+d13+d14+d15+d16+d17+d18+d19+d20;

                            document.getElementById("total4").innerHTML = "Numero incidencias de la ultima decada = " + " " +totaldecada;
                            document.getElementById("titulo4").innerHTML = "Numero de incidencias por año:";
                            generarGraficoNumeroIncidenciasPorDecada(contadorIncidenciasPorDecada,totaldecada);

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
                            var febrero = 0;
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
                                var mesformated = mes.substring(5, 7);


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


                                contadorIncidenciasPorMes = [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre];
                                var totalanio = enero + febrero + marzo + abril + mayo + junio + julio + agosto + septiembre + octubre + noviembre + diciembre;

                                document.getElementById("total1").innerHTML = "Numero total de incidencias = " + " " + totalanio;
                                document.getElementById("titulo1").innerHTML = "Numero de incidencias por mes:";
                                document.getElementById("titulo2").innerHTML = "Total tipo de resolucion:";
                                generarGraficoNumeroIncidenciasPorMes(contadorIncidenciasPorMes, totalanio);


                            }
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(thrownError);
                        alert("wsdfdsfdsfds");
                    }
                });




          function generarGraficoTipoIncidencia(aContador) {
                var cPinchazo = aContador[0];
                var cGolpe = aContador[1];
                var cAveria = aContador[2];
                var cOtro = aContador[3];

              var ctx = document.getElementById('myChart1').getContext('2d');
               myChart1 = new Chart(ctx, {
                  type: 'doughnut',
                  data: {
                      labels: ['Pinchazo', 'Golpe', 'Averia', 'otro'],
                      datasets: [{
                          label: '',

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

                var ctx = document.getElementById('myChart2').getContext('2d');
                 myChart2 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Abierta','Cerrada en Garaje','Cerrada Insitu'],
                        datasets: [{
                            label: '',

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


            function generarGraficoNumeroIncidenciasPorMes(aContadorIncidenciaPorMes,totalanio) {

                var ctx = document.getElementById('myChart3').getContext('2d');
                myChart3 = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                        datasets: [{
                            label: '',
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
            function generarGraficoNumeroIncidenciasPorDecada(aContadorIncidenciaPorDec,totaldecada) {

                var ctx = document.getElementById('myChart4').getContext('2d');
                myChart4 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['2010', '2011', '2012','2013','2014','2015','2016','2017','2018','2019','2020'],
                        datasets: [{
                            label: '',

                            data: [aContadorIncidenciaPorDec[0],aContadorIncidenciaPorDec[1],aContadorIncidenciaPorDec[2],
                                aContadorIncidenciaPorDec[3],aContadorIncidenciaPorDec[4],aContadorIncidenciaPorDec[5],
                                aContadorIncidenciaPorDec[6],aContadorIncidenciaPorDec[7],aContadorIncidenciaPorDec[8],
                                aContadorIncidenciaPorDec[9],aContadorIncidenciaPorDec[10]],
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

