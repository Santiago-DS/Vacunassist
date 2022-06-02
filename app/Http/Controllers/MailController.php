<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TurnoMailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // Envia el mail , se llama en routes/Web.php mediante el controlador
    public function send($idPaciente = null) {

        if($idPaciente == null){
            $correo = new TurnoMailable;
            Mail::to(auth()->user()->email)->send($correo);
        }
        else {

            /*$paciente = DB::table('users')->select('users.email AS mail')
            ->where('id' , $idPaciente)
            ->get(); */

            $correo = new TurnoMailable;

            $paciente = DB::table('users')->select('users.email')->where('id' , $idPaciente)->get();

            $email = strval($paciente->email);

            Mail::to($email)->send($correo);

        }

        return "Mensaje enviado";
    }

}
