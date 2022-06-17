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

}
