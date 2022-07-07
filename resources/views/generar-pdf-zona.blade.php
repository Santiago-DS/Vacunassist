<?php

$cantidadDeTurnosTotales =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->get();
$cantidadDeTurnosTotalesjson=json_decode($cantidadDeTurnosTotales);

//--------------------------------COVID -------------------------------//
$cantidadDeTurnosSolicitadosCovid =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->where('id_vacuna', '=', 1)->get();
$cantidadDeTurnosSolicitadosCovidjson = json_decode($cantidadDeTurnosSolicitadosCovid);

$cantidadDeTurnosAplicadosCovid =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->where('id_vacuna', '=', 1)->where('estado', '=', 'aplicado')->get();
$cantidadDeTurnosAplicadosCovidjson = json_decode($cantidadDeTurnosAplicadosCovid);


//--------------------------------fiebreamarila -------------------------------//
$cantidadDeTurnosSolicitadosfa =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->where('id_vacuna', '=', 2)->get();
$cantidadDeTurnosSolicitadosfajson = json_decode($cantidadDeTurnosSolicitadosfa);

$cantidadDeTurnosAplicadosfa =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->where('id_vacuna', '=', 2)->where('estado', '=', 'aplicado')->get();
$cantidadDeTurnosAplicadosfajson = json_decode($cantidadDeTurnosAplicadosfa);

//------------------------------------------------------------------------------------//

//-------------------------------Turnos Cancelados-------------------------------------//
$cantidadDeTurnosCancelados =  DB::table('turnos')->select(DB::raw('count(*) as cantidad'))->where('estado', '=', 'cancelado')->get();
$cantidadDeTurnosCanceladosjson = json_decode($cantidadDeTurnosCancelados);
//-------------------------------------------------------------------------------------//

$turnosporzona = DB::table('turnos')
->select('zonas.nombreZona', (DB::raw('count(id_zona) as cantidad')))
->join('zonas', 'zonas.id', '=', 'turnos.id_zona')->where('estado', '=','aplicado')
->groupBy('zonas.id','zonas.nombreZona')->get();

$json=json_decode($turnosporzona);
$textos = array();
$valores = array();

for ( $contador = 0; $contador < ($turnosporzona->count()); $contador = $contador + 1 ) {
    array_push($textos, $json[$contador]->nombreZona);
    array_push($valores, $json[$contador]->cantidad);
}

$etiquetas = $textos;
$datosVentas = $valores;

//Total de turnos por zonas que fueron pedidos(independiente de si estan cancelados, aplicados, ausentes, etc)
//SELECT zonas.nombreZona, COUNT(id_zona) as cantidadTotal FROM turnos RIGHT JOIN zonas on turnos.id_zona=zonas.id and id_vacuna=1 GROUP BY (id_zona), nombreZona
//$turnosporzonaCOVID = DB::table('turnos')
//->select('zonas.nombreZona', (DB::raw('count(id_zona) as cantidad')))
//->rightjoin('zonas', 'zonas.id', '=', 'turnos.id_zona' && 'id_vacuna', '=', 1)
//->groupBy('zonas.id','zonas.nombreZona')->get();

/*$turnosporzonaCOVID = DB::table('turnos')
->select('zonas.nombreZona', (DB::raw('count(id_zona) as cantidad')))
->join('vacunas', 'turnos.id_vacuna', '=', 'vacunas.id')
->rightjoin('zonas', function ($rightjoin) {
    $rightjoin->on('turnos.id_zona', '=', 'turnos.id_zona')
    ->where('turnos.id_vacuna', '=', '1');
})->groupBy('zonas.id','zonas.nombreZona')->get();

$turnosporzonaCOVIDjson=json_decode($turnosporzonaCOVID);

//TURNOS aplicados por zona covid
$turnosporzonaCOVIDAplicados = DB::table('turnos')
->select('zonas.nombreZona', (DB::raw('count(id_zona) as cantidad')))
->join('vacunas', 'turnos.id_vacuna', '=', 'vacunas.id')
->rightjoin('zonas', function ($rightjoin) {
    $rightjoin->on('turnos.id_zona', '=', 'turnos.id_zona')
    ->where('turnos.id_vacuna', '=', 1)
    ->where('turnos.estado', '=', 'aplicado');
})->groupBy('zonas.id','zonas.nombreZona')->get();

$turnosporzonaCOVIDAplicadosjson=json_decode($turnosporzonaCOVIDAplicados);

$zonas = array();
$solicitadosPorZona = array();

$AplicadosPorZona = array();

for ( $contador2 = 0; $contador2 < ($turnosporzonaCOVID->count()); $contador2 = $contador2 + 1 ) {
    array_push($zonas, $turnosporzonaCOVIDjson[$contador2]->nombreZona);
    array_push($solicitadosPorZona, $turnosporzonaCOVIDjson[$contador2]->cantidad);
    array_push($AplicadosPorZona, $turnosporzonaCOVIDAplicadosjson[$contador2]->cantidad);
} */

?>

<style>
    .titulo{
        font-size: xx-large;
        font-size: 30px;
        color:#469b8f;
        font-family:Cursive;
        text-decoration:underline;
        text-transform:capitalize;
        text-align:center;
        text-indent:30px;
    }

    .titulo2{
        font-size: xx-large;
        font-size: 25px;
        color:#424a4e;
        font-family:Cursive;
        text-transform:capitalize;
        text-align:center;
        text-indent:30px;
    }

    .seccionVacuna{
        margin:5px;
        padding: 0;
        background: #ede2e2;
        border-radius: 15px;
        text-align: center;
    }
</style>
<html>
    <body>
        <h2 class="titulo"> Informe - vacunas aplicadas, Turnos cancelados y turnos aplicados por zona </h2>
        <hr>
        <h3> Cantidad de turnos totales: <?php echo $cantidadDeTurnosTotalesjson[0]->cantidad ?> </h2>
        <div class="seccionVacuna">
            <h2 class="titulo2">Covid</h2>
            <span class="titulo2"> Solicitados: <?php echo $cantidadDeTurnosSolicitadosCovidjson[0]->cantidad ?> </span>
            <span class="titulo2"> Aplicados: <?php echo $cantidadDeTurnosAplicadosCovidjson[0]->cantidad ?> </span>
        </div>

        <div class="seccionVacuna">
            <h2 class="titulo2">Fiebre Amarilla</h2>
            <span class="titulo2"> Solicitados: <?php echo $cantidadDeTurnosSolicitadosfajson[0]->cantidad ?> </span>
            <span class="titulo2"> Aplicados: <?php echo $cantidadDeTurnosAplicadosfajson[0]->cantidad ?> </span>
        </div>

        <div class="seccionVacuna">
            <h2 class="titulo2">Turnos Cancelados</h2>
            <span class="titulo2"> Cantidad de turnos Cancelados: <?php echo $cantidadDeTurnosCanceladosjson[0]->cantidad ?> </span>
        </div>
        <div class="seccionVacuna">
            <h2 class="titulo2">Turnos Aplicados por Zona</h2>
            <?php
            for ( $contador = 0; $contador < ($turnosporzona->count()); $contador = $contador + 1 ) {
            ?>
                <span class="titulo2"> Zona <?php echo  $json[$contador]->nombreZona ?>: <?php echo $json[$contador]->cantidad ?> </span><br>
            <?php
            }
            ?>
        </div>
    </body>
</html>
