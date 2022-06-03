
<?php
 //use Illuminate\Support\Facades\Crypt;
 use Illuminate\Support\Facades\Crypt;

 $enfermero = DB::table('users')
 ->select('*')
 ->latest()->first();

 $password = Str::random(8);

 $nombreDeUsuario = $enfermero->email;

 $affected = DB::table('users')
              ->where('id', $enfermero->id)
              ->update(['password' => bcrypt($password)]);
 ?>

<!DOCTYPE html>
<body>

<strong>Envio automatico por tu registro en Vacunaasist</strong>
<p> Nombre de usuario <?php echo $nombreDeUsuario; ?>
<p> Contrasenia <?php echo $password; ?>

<span> Por favor no respondas a este mensaje.
    Para obtener mas informacion o cancelar tu turno recuerda puedes hacerlo desde la App.
    -Vacunassist </span>
</body>
<html>