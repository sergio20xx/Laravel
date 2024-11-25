<?php

namespace App\Http\Controllers;

use App\Models\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view ('usuario.login');
    }

    public function login(Request $request)
    {        
        $credentials = [
            'nombre' => $request->nombre,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $users = DB::table('users')->get();

	        return view('usuario.index', compact('users'));
	    }else{
            return view ('usuario.login');
        }
    }

    public function registrar (Request $request)
    {
        return view ('usuario.registrar');
    }

    public function logout ()
    {
        Session::flush();
        Auth::logout();
        return view ('usuario.login');
    }
}
