<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">

        <title>Menú principal</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        @if(Auth::check())
        <div>
            <h2>¡Bienvenido {{Auth::user()->nombre}}!</h2>
            <div class="nav">
                <a href="#" class="active">Menú</a>
		        <a href="{{ url('/registrar') }}">Registrar usuario</a>
		        <form style="display: inline" action="{{ url('/logout') }}" method="post">
                    @csrf
                <a href="#" onclick="this.closest('form').submit()">Cerrar sesión</a>
                </form>
            </div>
                <div>
                    @csrf
                    <table> 
                        <h2>Lista de usuarios</h2>
                        <tr>
                            <td>
                                <h3>Id</h3>
                            </td>
                            <td>
                                <h3>Nombre</h3>
                            </td>
                            <td>
                                <h3>Email</h3>
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
                                {{ $user->email }}
                            </td>
                            <td>
                                <a href="{{ route('usuario.editar', $user->id) }}" class="link">Editar</a>
                            </td>
                            <td>
                                <a href="{{ route('usuario.eliminar', $user->id) }}" class="link">Eliminar</a>
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
                        <a href="{{ url('/login') }}" class="link">Login</a>
                    </td>
                </tr> 
            </table>     
        </div>
        @endif
    </body>
</html>
