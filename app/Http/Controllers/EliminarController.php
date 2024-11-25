<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EliminarController extends Controller
{
    public function eliminar($id)
    {
        $datosUsuario = user::find($id);
        $datosUsuario->delete();

        $users = DB::table('users')->get();

        return view ('usuario.index', compact('users'));
    }
}
