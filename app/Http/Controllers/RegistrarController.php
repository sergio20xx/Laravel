<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RegistrarController extends Controller
{
    public function index()
    {   
        if(Auth::guest()){
            $bandera = 1;
            return view ('usuario.registrar', compact('bandera'));
        }else{
            $bandera = null;
            return view ('usuario.registrar', compact('bandera'));
        }
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nombre'=> ['required', 'min:3', 'max:10', 'unique:users'],
            'password' => ['required', 'min:3', 'max:20']
        ]);

        $usuario = new User;
        $usuario->nombre = $request->input('nombre');
        $usuario->password = Crypt::encrypt($request->input('password'));
        $usuario->save();

        $users = DB::table('users')->get();

        if(Auth::check()){
            return view ('usuario.index', $usuario, compact('users'));
        }else{
            Auth::login($usuario);

            return view ('usuario.index', $usuario, compact('users'));
        }
    }

    public function logear (Request $request)
    {
        return view ('usuario.login');
    }
}
