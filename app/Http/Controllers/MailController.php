<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TurnoMailable;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // Envia el mail , se llama en routes/Web.php mediante el controlador
    public function send() {
        $correo = new TurnoMailable;
        Mail::to(auth()->user()->email)->send($correo);
        return "Mensaje enviado";
    }

}
