<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegistrarController extends Controller
{
    public function index()
    {
        return view ('usuario.registrar');
    }

    public function registrar(Request $request)
    {
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
