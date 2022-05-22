<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Historiaclinica;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function generarPDF() {
        $pdf = PDF::loadView('generar-pdf');
        return $pdf->stream('Certificado Vacunassist.pdf');
    }

    public function down($id) {
        $registro = Historiaclinica::findOrFail($id);
        $registro->delete();
        return redirect('historiaclinica');
    }

}
