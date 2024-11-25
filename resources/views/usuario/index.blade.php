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
        <div>
            <h1>Menú</h1>
            <nav>
            <ul>
		        <li><a href="{{ url('/registrar') }}">Registrar usuario</a></li>
		        <li><a href="{{ url('/logout') }}">Cerrar sesión</a></li>
	        </ul>
            </nav>
            <ul>
                <div>
                    <form action="{{ url('/editar') }}" method="post">
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
    </body>
</html>
