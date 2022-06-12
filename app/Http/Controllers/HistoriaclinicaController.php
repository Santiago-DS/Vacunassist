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

        $cantidad = HistoriaClinica::where("id_paciente", $id_paciente)->where("id_vacuna", '1')->count();

        if ($cantidad == 1) {
            Turno::create([
                'fecha' => new DateTime('2 week'),
                'hora' => new DateTime('today'),
                'id_paciente'=> $id_paciente,
                'id_zona' => 2,
                'id_vacuna' => 1,
            ]);

            $controlador = new MailController;
            $controlador->send($id_paciente);

            $id_historia = HistoriaClinica::select('id')
            ->where('id_paciente' , $id_paciente)
            ->latest()->first();


            return redirect()->route('registrar-lote-lab', ['id_historia' => $id_historia, 'boolean' => '1']);

        }

        $id_historia = HistoriaClinica::select('id')
            ->where('id_paciente' , $id_paciente)
            ->latest()->first();

        return redirect()->route('registrar-lote-lab', ['id_historia' => $id_historia]);
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

    public function registrarLote() {
        $id_historia = request()->get('id_historia');
        Historiaclinica::where("id", $id_historia)->update(["id_laboratorio" => request()->get('id_laboratorio')]);
        Historiaclinica::where("id", $id_historia)->update(["lote" => request()->get('lote')]);

        $boolean = request()->get('boolean');
        if($boolean){
            return redirect('homeEnfermero')->with('segundoturno','ok');
        }
        return redirect('homeEnfermero')->with('cargalotelab', 'ok');
    }

}
