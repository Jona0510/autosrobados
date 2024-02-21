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
        <form method="POST" action="{{route('autosrobados.store')}}"><!-- /recibe-contacto -->
            @csrf 
            <!-- Este es un meto de hace un input oculto con token de validacion de origen de peticion -->
            <!-- Este hace un token para que podmaso pasar el perimetro de seguridad -->
            <label for="marca">Marca:</label><input value="{{old('marca')}}" name='marca' type="text" required>
            @error('marca')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="modelo">Modelo:</label><input value="{{old('modelo')}}" name='modelo'  type="text" required>
            @error('modelo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="fecha">Feca de robo:</label><input value="{{old('fecha')}}"  name='fecha' type="date" required><br>
            @error('fecha')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
     
            <label for="estatus">Estatus:</label>
            <select name="estatus" id="estatus">
                <option value="Robada" @selected(old('estatus') == 'Robada')>Robada</option>
                <option value="Recuperada" @selected(old('estatus') == 'Recuperada')>Recuperada</option>
                <option value="Sin_reporte" @selected(old('estatus') == 'Sin_reporte')>Sin reporte</option>
            </select>
            @error('estatus')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" value="enviar" id="submit">Enviar</button>
        </form>
    </section>
    <br>
    <a href="{{route('autosrobados.index')}}">Regresar</a>
    
</body>
</html>