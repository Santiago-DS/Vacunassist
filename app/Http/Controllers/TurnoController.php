<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Turno;

class TurnoController extends Controller
{

public function store(){
 
    Turno::create([ 
        'fecha' => request()->get('fecha'),
        'hora' => new DateTime('today'),
        'id_paciente'=> auth()->id(),
        'id_zona' => request()->get('zona'),
        'id_vacuna' => request()->get('vacuna'),
        ]);

        return redirect('home');

}

}
