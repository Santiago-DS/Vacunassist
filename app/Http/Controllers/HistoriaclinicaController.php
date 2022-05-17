<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Historiaclinica;

class HistoriaclinicaController extends Controller
{
    
    public function store(){
 
        Historiaclinica::create([ 
            'fecha' => request()->get('fecha'),
            'id_paciente' => auth()->id(),
            'id_vacuna' => request()->get('vacuna'),
            ]);
    
            return redirect('historiaclinica');
    }
}
