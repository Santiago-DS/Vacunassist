<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{


    public function agregarVacuna() {

        echo "ok";
        Vacuna::create([
            'nombreVacuna' => request()->get('nombreVacuna'),
            'estado' => 1
        ]);

    }

}
