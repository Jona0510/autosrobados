<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto seleccionado</title>
</head>
<body>
    <h1>Auto seleccionado {{$autosrobado->id}}</h1>
    <ul>
        <li>Marca: {{$autosrobado->Marca}}</li>
        <li>Modelo: {{$autosrobado->Modelo}}</li>
        <li>Fecha de robo: {{$autosrobado->Fecha_robo}}</li>
        <li>Estatus: {{$autosrobado->Estatus}}</li>
    </ul>
    <a href="{{route('autosrobados.index')}}">Regresar</a>
    <a href="{{route('autosrobados.edit', $autosrobado->id)}}">Editar</a><br><br>
    <form action="{{route('autosrobados.destroy', $autosrobado->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    
</body> 
</html>