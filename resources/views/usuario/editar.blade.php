<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrar usuario</title>
    </head>
    <body>
        <div>
            <form action="{{ url('/editar') }}" method="post">   
                @csrf
                @method('POST')
                <table> 
                    <tr>
                        <td>
                            <h2>Editar usuario</h2>    
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <label for="id">Id:</label>
                        </td>  
                        <td>
                            <input type="text" name="id" value="{{ $usuario->id }}" required>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <label for="nombre">Nombre:</label>
                        </td>  
                        <td>
                            <input type="text" name="nombre" value="{{ $usuario->nombre }}" required>
                        </td>
                    </tr>   
                    <tr>
                        <td>
                            <label for="password">Contraseña:</label>
                        </td>  
                        <td>    
                            <input type="password" name="password" value="{{ $usuario->password }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ url('/atras') }}">Atras</a>
                        </td>
                        <td>
                            <input type="submit" value="Editar">
                        </td>
                    </tr>  
                </table>   
            </form>
        </div>
    </body>
</html>
