<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">

        <title>Registrar usuario</title>
    </head>
    <body>
        <div>
            <form action="{{ url('/registrar') }}" method="post">   
                @csrf
                @method('POST')
                <table> 
                    <tr>
                        <td>
                            <h2>Registrar usuario</h2>    
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
                    <tr>
                        <td>
                            <label for="email">Email:</label>
                        </td>  
                        <td>
                            <input type="text" name="email" value="{{ old('email') }}">
                            <br>
                            @error('email')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr> 
                        <td>
                            <label for="password">Contraseña:</label>
                        </td>  
                        <td>    
                            <input type="password" name="password" value="{{ old('password') }}">
                            <br>
                            @error('password')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        @if($bandera == null)
                        <td>
                            <a href="{{ url('/atras') }}" class="enlace">Volver</a>
                        </td>
                        @else
                        <td>
                            <a href="{{ url('/login') }}" class="enlace">Volver</a>
                        </td>
                        @endif
                        <td>
                            <input type="submit" value="Registrar" class="boton">
                        </td>
                </table>  
            </form>
        </div>
    </body>
</html>
