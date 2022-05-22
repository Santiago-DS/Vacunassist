<?php
            $turno = DB::table('turnos')
            ->join('vacunas', 'vacunas.id', '=', 'turnos.id_vacuna')
            ->join('zonas', 'zonas.id', '=', 'turnos.id_zona')
            ->select('turnos.id AS id_turno' , 'turnos.id_vacuna' ,
            'turnos.fecha' , 'turnos.id_zona' , 'vacunas.nombreVacuna' , 'zonas.nombreZona', 'turnos.created_at' )
            ->latest()->first();

?>

<!DOCTYPE html>
<body>

<strong>Envio automatico por tu registro en Vacunaasist</strong>
<p> ¡Hola, <?php echo auth()->user()->name ?> ! Te informamos que se ha asignado un turno para recibir
    la vacuna <?php echo $turno->nombreVacuna ?> <br>, con el siguiente detalle:</p>
<p>Fecha: <?php echo $turno->fecha ?></p>
<p>Lugar :<?php echo $turno->nombreZona ?></p>


<span> Por favor no respondas a este mensaje.
    Para obtener mas informacion o cancelar tu turno recuerda puedes hacerlo desde la App.
    -Vacunassist </span>
</body>
<html>



