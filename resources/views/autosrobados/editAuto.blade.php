<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autos</title>
</head>
<body>
    <h1>Modifiquemos los datos del auto</h1>

    <!-- <a href="/informacion">Información</a> -->
    <section>
        <form method="POST" action="{{ route('autosrobados.update', $autosrobado) }}"><!-- /recibe-contacto -->
            @csrf 
            <!-- Este es un meto de hace un input oculto con token de validacion de origen de peticion -->
            <!-- Este hace un token para que podmaso pasar el perimetro de seguridad -->
            @method('PATCH')
            <!-- Input oculto para poder hacer el edit en la base de datos -->
            <label for="marca">Marca:</label><input name='marca' type="text" value="{{$autosrobado->Marca }}">
            <label for="modelo">Modelo:</label><input name='modelo'  type="text" value="{{$autosrobado->Modelo }}">

            <label for="fecha">Feca de robo:</label><input  name='fecha' type="date" value="{{$autosrobado->Fecha_robo}}"><br>
     
            <label for="estatus">Estatus:</label>
            <select name="estatus" id="estatus">
                <option value="Robada" @selected($autosrobado->Estatus == 'Robada')>Robada</option>
                <option value="Recuperada" @selected($autosrobado->Estatus == 'Recuperada')>Recuperada</option>
                <option value="Sin_reporte" @selected($autosrobado->Estatus == 'Sin_reporte')>Sin reporte</option>
            </select>

            <button type="submit" value="enviar" id="submit">Enviar</button>
        </form>
        <br>
        <a href="{{route('autosrobados.show', $autosrobado)}}">Regresar</a>

    </section>
    
</body>
</html>