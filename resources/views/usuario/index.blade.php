<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style type="text/css">
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            table { 
                border-collapse: collapse; 
                margin: 25px 0; 
                font-size: 1em; 
                font-family: sans-serif; 
                min-width: 450px; 
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); 
            }
        </style>

        <title>Menú principal</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        @if(Auth::check())
        <div>
            <h1>Menú</h1>
            <nav>
            <ul>
                <li><p>¡Bienvenido {{Auth::user()->nombre}}!</p></li>
		        <li><a href="{{ url('/registrar') }}">Registrar usuario</a></li>
		        <li><form style="display: inline" action="{{ url('/logout') }}" method="post">
                    @csrf
                    <a href="#" onclick="this.closest('form').submit()">Cerrar sesión</a>
                </form></li>
	        </ul>
            </nav>
            <ul>
                <div>
                    @csrf
                    <h1>Lista de usuarios</h1>
                    <table> 
                        <tr>
                            <td>
                                <h3>Id</h3>
                            </td>
                            <td>
                                <h3>Nombre</h3>
                            </td>
                        </tr>
                        @foreach($users as $user)
		                 <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->nombre }}
                            </td>
                            <td>
                                <a href="{{ route('usuario.editar', $user->id) }}">Editar</a>
                            </td>
                            <td>
                                <a href="{{ route('usuario.eliminar', $user->id) }}">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </form>
                </div>
            </ul>
        </div>
        @else
        <div>
            <table> 
                <tr>
                    <td>
                        <h2>¡Error!</h2>   
                        <p>Debe iniciar sesión</p>    
                    </td>
                </tr>  
                <tr>
                    <td>
                        <a href="{{ url('/login') }}">Login</a>
                    </td>
                </tr> 
            </table>     
        </div>
        @endif
    </body>
</html>
