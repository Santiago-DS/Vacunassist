<?php

$turno = DB::table('turnos')->latest()->first();

switch ($turno->id_vacuna) {
    case 1:
        $nombre= "COVID" ;
        break;
    case 2:
        $nombre= "Fiebre amarilla" ;
        break;
    case 3:
        $nombre= "Gripe" ;
        break;
}


?>


<!DOCTYPE html>
<body>

<strong>Envio automatico por tu registro en Vacunaasist</strong>
<p> ¡Hola, NOMBRE! Te informamos que se ha asignado un turno para recibir
    la vacuna <?php echo $nombre ?> <br>, con el siguiente detalle:</p>
<p>fecha: <?php echo $turno->fecha ?></p><br>
<p>lugar : "a confirmar"</p>


<span> Por favor no respondas a este mensaje.
    Para obtener mas informacion o cancelar tu turno recuerda puedes hacerlo desde la App.
    -Vacunassist </span>
</body>
<html>



