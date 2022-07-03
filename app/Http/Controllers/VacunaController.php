<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Vacuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;

class VacunaController extends Controller
{


    public function agregarVacuna() {

        request()->validate([
            'nombreVacuna' => 'required'
        ]);

        $existeNombreVacuna = DB::table('vacunas')->where('nombreVacuna', request()->get('nombreVacuna'))->count();

        if($existeNombreVacuna == 0) {  // Si es 0 , el nombreVacuna no esta en la DB
            Vacuna::create([
                'nombreVacuna' => request()->get('nombreVacuna'),
                'estado' => 1
            ]);
        }
        else if($existeNombreVacuna == 1) { // Si es 1 , ya hay una vacuna con ese nombre
            $estadoVacuna = DB::table('vacunas')->select('estado')->where('nombreVacuna', request()->get('nombreVacuna'))->first();

            if($estadoVacuna->estado == 0) {    // esta cargada y 'eliminada'
                Vacuna::where('nombreVacuna', request()->get('nombreVacuna'))->update(["estado" => 1]);
            }
            else if ($estadoVacuna->estado == 1) { // esta cargada y activa
                 request()->validate([
                    'nombreVacuna' => 'unique:vacunas,nombreVacuna'
                ]);
            }

        }

        return redirect('/vacunas')->with('vacuna-cargada', 'ok');
    }

    // Esto es el 'eliminar' vacuna
    public function edit($id) {
        Vacuna::where("id", $id)->update(["estado" => 0]);
        return redirect('/vacunas')->with('eliminar','ok');
    }

    public function confirmarTurno($id_turno) {
        Turno::where("id", $id_turno)->update(["estado" => 'pendiente']);
        return redirect('/aprobacion-turnos')->with('confirmar-turno','ok');
    }

    public function denegarTurno($email , $id_turno) {
        $controlador = new MailController;
        $controlador->sendAvisoTurnoRechazado($email);
        Turno::where("id", $id_turno)->update(["estado" => 'cancelado']);
        return redirect('/aprobacion-turnos')->with('denegar-turno','ok');
    }

    public function generarReporteZona() {
        $pdf = PDF::loadView('generar-pdf-zona');
        return $pdf->stream('falopa.pdf');
    }

// VER//
    //public function eliminarVacuna() {

//        request()->validate([
  //          '*' => 'required'
    //    ]);
     //   $nombreVacuna = request()->get('nombreVacuna');
     //   $nombreVacuna = strtoupper($nombreVacuna);              // cnvierte a mayusculas.
     //   $vacuna = Vacuna::where("nombreVacuna", $nombreVacuna)->where("nombreVacuna", 'nombreVacuna');

      //  if ($vacuna == 1) {
      //      Vacuna::update([
   
    //            'estado'=> "noDisponible",
               
      //      ]);
    //}
}
