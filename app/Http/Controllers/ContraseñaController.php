<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContraseñaController extends Controller
{
    public function recuperar(Request $request)
    {
        return view ('usuario.index');
    }
}
