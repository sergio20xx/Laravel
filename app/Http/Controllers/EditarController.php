<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EditarController extends Controller
{
    public function index($id)
    {
        $usuario = user::find($id);

        return view ('usuario.editar', compact('usuario'));
    }

    public function editar(Request $request)
    {
        $request->validate([
            'id'=> ['required'],
            'nombre'=> ['required'],
            'password' => ['required']
        ]);

        $usuario = User::find($request->id);
        $usuario->id = $request->id;
        $usuario->nombre = $request->nombre;
        $usuario->password = Hash::make($request->input('password'));

        $usuario->update();

        $users = DB::table('users')->get();

        return view ('usuario.index', compact('users'));
    }
}
