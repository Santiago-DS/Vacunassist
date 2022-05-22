<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Historiaclinica;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Date;

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

        $controlador = new MailController;
        $controlador->send();

        return redirect('ver-turnos')->with('solicitar','ok');

    }

    public function edit($id) {
        Turno::where("id", $id)->update(["estado" => "cancelado"]);
        return redirect('ver-turnos')->with('eliminar','ok');
    }

    public function turnoAutomatico() {

        /*request()->validate([
            '*' => 'required'   //
        ]); */

        if (isset($_POST['ninguna'])){

            Turno::create([
                'fecha' => new DateTime('tomorrow'),
                'hora' => new DateTime('today'),
                'id_paciente'=> auth()->id(),
                'id_zona' => 2,
                'id_vacuna' => 1,
            ]);

            $controlador = new MailController;
            $controlador->send();
            return redirect('ver-turnos');

        }
        else if (isset($_POST['una_dosis'])) {

            Historiaclinica::create([
                'fecha' => request()->get('fecha_primera'),
                'id_paciente' => auth()->id(),
                'id_vacuna' => 1
            ]);


            Turno::create([
                'fecha' => new DateTime('+1 week'),
                'hora' => new DateTime('today'),
                'id_paciente'=> auth()->id(),
                'id_zona' => 2,
                'id_vacuna' => 1,
            ]);

            $controlador = new MailController;
            $controlador->send();



            return redirect('ver-turnos');

        }
        else if (isset($_POST['dos_dosis'])) {

            Historiaclinica::create([
                'fecha' => request()->get('fecha_primera_dos'),
                'id_paciente' => auth()->id(),
                'id_vacuna' => 1
            ]);

            Historiaclinica::create([
                'fecha' => request()->get('fecha_segunda'),
                'id_paciente' => auth()->id(),
                'id_vacuna' => 1
            ]);
            
            return redirect('ver-turnos');

        }

    }

}
