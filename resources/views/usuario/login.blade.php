<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesión</title>
    </head>
    <body>
        <div>
            <form action="{{ url('/login') }}" method="post">   
                @csrf
                @method('POST')
                <table> 
                    <tr>
                        <td>
                            <h2>Login</h2>    
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            <label for="nombre">Nombre:</label>
                        </td>  
                        <td>
                            <input type="text" name="nombre" value="{{ old('nombre') }}">
                            <br>
                            @error('nombre')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>   
                    <tr>
                        <td>
                            <label for="password">Contraseña:</label>
                        </td>  
                        <td>    
                            <input type="password" name="password">
                            <br>
                            @error('password')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ url('/registrar') }}">Registrar</a>
                        </td>
                        <td>
                            <input type="submit" value="Inicia sesión">
                        </td>
                    </tr>  
                </table>  
            </form>
        </div>
    </body>
</html>
