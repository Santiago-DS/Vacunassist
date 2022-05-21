<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit(){
        $id = auth()->id();
        User::where("id", $id)->update([
            'name'=> request()->get('name'),
            'apellido'=> request()->get('apellido'),
            'direccion'=> request()->get('direccion'),
            'telefono' => request()->get('telefono')
        ]);
        return redirect('miperfil')->with('editar','ok');
    }
}
