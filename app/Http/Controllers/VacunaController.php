<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{


    public function agregarVacuna() {

        request()->validate([
            'nombreVacuna' => 'required | unique:vacunas,nombreVacuna'
        ]);

        Vacuna::create([
            'nombreVacuna' => request()->get('nombreVacuna'),
            'estado' => 1
        ]);

        return redirect('/vacunas')->with('vacuna-cargada', 'ok');
    }

// VER//
    public function eliminarVacuna() {

        request()->validate([
            '*' => 'required'
        ]);
        $nombreVacuna = request()->get('nombreVacuna');
        $nombreVacuna = strtoupper($nombreVacuna);              // cnvierte a mayusculas.
        $vacuna = Vacuna::where("nombreVacuna", $nombreVacuna)->where("nombreVacuna", 'nombreVacuna');

        if ($vacuna == 1) {
            Vacuna::update([
   
                'estado'=> "noDisponible",
               
            ]);
    }

}
