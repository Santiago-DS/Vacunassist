<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TurnoMailable;
use App\Mail\PasswordMailable;
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
            $correo = new TurnoMailable;
            $emailPaciente= DB::table('users')->
            select('users.email')->where('id' , $idPaciente)->get('email');
            Mail::to($emailPaciente)->send($correo);
        }

        return "Mensaje enviado";
    }

    // Envia el mail , se llama en routes/Web.php mediante el controlador
    public function sendContrasenia($correoEnfermero) {
            $correo = new PasswordMailable;
            Mail::to($correoEnfermero)->send($correo);
    
        return "Mensaje enviado";
    }

}
