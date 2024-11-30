<?php

namespace App\Http\Controllers;

use App\Models\User as Authenticatable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;

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

        //$credentials = [
            //'nombre' => $request->nombre,
            //'password' => $request->password
            //'password' => Crypt::encrypt($request->input('password'))
        //];
        
        $nombre = $request->get('nombre');
        $password = $request->get('password');
        $usuario = User::where('nombre', $nombre)->first();

        if($usuario){
            $usuario->password = Crypt::decrypt($usuario->password);

            if($usuario->password == $password){
        //if(Auth::attempt(['nombre'=>$credentials,'password'=>$request])){
                Auth::login($usuario);
                $request->session()->regenerate();
                $users = DB::table('users')->get();

	            return redirect()->to('/index')->with(compact('users'));
	        }else{
                return redirect()->to('/');
            }
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
