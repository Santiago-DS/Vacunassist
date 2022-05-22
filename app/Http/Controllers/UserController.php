<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Crypt;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(){

        request()->validate([
            '*' => 'required'              // Todos los campos obligatorios
        ]);


        $id = auth()->id();
        User::where("id", $id)->update([
            'name'=> request()->get('name'),
            'apellido'=> request()->get('apellido'),
            'direccion'=> request()->get('direccion'),
            'telefono' => request()->get('telefono')
        ]);
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
}
