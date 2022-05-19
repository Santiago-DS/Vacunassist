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
<h1>
<p>
vacuna: <?php echo $nombre ?> <br>
fecha: <?php echo $turno->fecha ?><br>
zona : "a confirmar" 
</p>
</h1>
<p> Vacunassist </p>
</body>
<html



