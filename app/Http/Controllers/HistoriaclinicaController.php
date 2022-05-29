<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Historiaclinica;
use App\Models\Turno;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;

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

    public function registrarAplicacion($id_turno, $id_paciente, $id_vacuna){

        Turno::where("id", $id_turno)->update(["estado" => "aplicado"]);

        Historiaclinica::create([
            'fecha' => new DateTime('today'),
            'id_paciente' => $id_paciente,
            'id_vacuna' => $id_vacuna,
        ]);

        return redirect('homeEnfermero');
    }

    public function registrarAusencia($id_turno, $id_paciente = null, $id_vacuna = null){
        Turno::where("id", $id_turno)->update(["estado" => "ausente"]);
        return redirect('homeEnfermero');
    }


    public function down($id) {
        $registro = Historiaclinica::findOrFail($id);
        $registro->delete();
        return redirect('historiaclinica');
    }

}
