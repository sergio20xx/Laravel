<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class EditarController extends Controller
{
    public function index($id)
    {
        $usuario = user::find($id);

        $usuario->password = Crypt::decrypt($usuario->password);

        return view ('usuario.editar', compact('usuario'));
    }

    public function error(Request $request)
    {
        return view ('usuario.index');
    }

    public function editar(Request $request)
    {
        $request->validate([
            'id'=> ['required', 'numeric'],
            'nombre'=> ['required', 'min:3', 'max:10', "unique:users,nombre,{$request->id}"],
            'email'=> ['required'],
            'password' => ['required', 'min:3', 'max:20']
        ]);

        $usuario = User::find($request->id);
        $usuario->id = $request->id;
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Crypt::encrypt($request->input('password'));
        //$usuario->password = $request->password;
        //$usuario->password = Hash::make($request->input('password'));

        $usuario->update();

        $users = DB::table('users')->get();

        return view ('usuario.index', compact('users'));
    }
}
