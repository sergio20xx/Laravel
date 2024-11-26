<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'nombre'=> ['required'],
            'password' => ['required']
        ]);

        $usuario= new User;
        $usuario->nombre = $request->input('nombre');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->save();

        $users = DB::table('users')->get();

        return view ('usuario.index', $usuario, compact('users'));
    }

    public function logear (Request $request)
    {
        return view ('usuario.login');
    }
}
