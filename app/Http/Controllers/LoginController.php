<?php

namespace App\Http\Controllers;

use App\Models\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function index()
    { 
        return view ('usuario.login');
    }

    public function login(Request $request)
    {   
        $request->validate([
            'nombre'=> ['required'],
            'password' => ['required']
        ]);

        $credentials = [
            'nombre' => $request->nombre,
            'password' => $request->password
            //'password' => Crypt::decryptString($password)
        ];

        if (Auth::attempt($credentials)) {
            $users = DB::table('users')->get();

	        return redirect()->to('/index')->with(compact('users'));
	    }else{
            return redirect()->to('/');
        }
    }

    public function registrar (Request $request)
    {
        return view ('usuario.registrar');
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/');
    }
}
