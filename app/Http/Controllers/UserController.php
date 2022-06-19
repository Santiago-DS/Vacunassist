<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Crypt;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function edit(){

        request()->validate([
            '*' => 'required',              // Todos los campos obligatorios
        ]);

        $id = auth()->id();

        if((auth()->user()->documento== request()->get('documento'))){
            User::where("id", $id)->update([
                'name'=> request()->get('name'),
                'apellido'=> request()->get('apellido'),
                'direccion'=> request()->get('direccion'),
                'telefono' => request()->get('telefono'),
                'fecha_nacimiento' => request()->get('fecha_nacimiento')
            ]);
        }
        else
        {
            $dni = request()->get('documento');
            $hayAlgo = DB::table('users')->where('users.documento', $dni)->get();

            if($hayAlgo){
                return redirect('miperfil')->with('editar','no');
            }
            else{
                User::where("id", $id)->update([
                    'name'=> request()->get('name'),
                    'apellido'=> request()->get('apellido'),
                    'direccion'=> request()->get('direccion'),
                    'telefono' => request()->get('telefono'),
                    'fecha_nacimiento' => request()->get('fecha_nacimiento')
                ]);
            }
        }

        return redirect('miperfil')->with('editar','ok');
    }


    public function actualizarContrasenia(){

   //Validacion
   request()->validate([
    '*' => 'required',              // Todos los campos obligatorios
    'newPassword' => 'min:6| same:newPassword2',
    'newPassword2' => 'min:6 | required | same:newPassword'
]);

    $dbPassword = auth()->user()->password;

   if (Hash::check(request()->get('oldPassword'), $dbPassword)) {

        $user = Auth::user(); // Obtenga la instancia del usuario en sesión

        $password = bcrypt(request()->get('newPassword')); // Encripte el password

        $user->password = $password;
        $user->save();
        return redirect('home')->with('actualizarContrasenia','ok');
    }

    return redirect('micontrasenia')->with('actualizarContrasenia','no');

    }

    public function actualizarSede($id_enfermero) {
        return redirect()->route('form-actualizar-sede', ['id_enfermero' => $id_enfermero]);
    }

    public function actualizarSedeEfectivo() {

        User::where("id", request()->get('id_enfermero'))->update([
            'id_zona'=> request()->get('id_zona')
        ]);

        return redirect('actualizar-sede')->with('sede-actualizada','ok');
    }
}
