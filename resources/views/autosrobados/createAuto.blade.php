<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos</title>
</head>
<body>
    <h1>Indica el auto que quieres registrar</h1>

    <!-- <a href="/informacion">Información</a> -->
    <section>
        <form method="POST" action="/autosrobados"><!-- /recibe-contacto -->
            @csrf 
            <!-- Este es un meto de hace un input oculto con token de validacion de origen de peticion -->
            <!-- Este hace un token para que podmaso pasar el perimetro de seguridad -->
            <label for="marca">Marca:</label><input name='marca' type="text">
            <label for="modelo">Modelo:</label><input name='modelo'  type="text">

            <label for="fecha">Feca de robo:</label><input  name='fecha' type="date"><br>
     
            <label for="estatus">Estatus:</label>
            <select name="estatus" id="estatus">
                <option value="Robada">Robada</option>
                <option value="Recuperada">Recuperada</option>
                <option value="Sin_reporte">Sin reporte</option>
            </select>

            <button type="submit" value="enviar" id="submit">Enviar</button>
        </form>
    </section>
    
</body>
</html>