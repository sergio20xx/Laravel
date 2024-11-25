<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eliminar usuario</title>
    </head>
    <body>
        <div>
            <form action="{{ url('/eliminar') }}" method="post">   
                @csrf
                <table> 
                    <tr>
                        <td>
                            <h2>Eliminar usuario</h2>    
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            <label for="nombre">Nombre:</label>
                        </td>  
                        <td>
                            <input type="text" name="nombre" >
                        </td>
                    </tr>   
                    <tr>
                        <td>
                            <label for="password">Contraseña:</label>
                        </td>  
                        <td>    
                            <input type="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Eliminar">
                        </td>
                    </tr>  
                </table>  
            </form>
        </div>
    </body>
</html>
