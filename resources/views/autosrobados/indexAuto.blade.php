<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Comprueba el status de tu auto</h1>

    <!-- <a href="autosrobados/indexAuto">Registrar auto robado</a> -->

    <table border="1">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Fecha de robo</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autosrobado as $auto)
            <tr>
                <td>{{$auto->Marca}}</td>
                <td>{{$auto->Fecha_robo}}</td>
                <td><a href="{{route('autosrobados.show', $auto)}}">Ver detalles</a></td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <a href="{{route('autosrobados.create')}}">Registrar auto robado</a>

    
</body>
</html>