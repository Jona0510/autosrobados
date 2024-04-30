<x-a-layout>
    <body>
        <h1 class="display-3 text-center text-info">Auto seleccionado {{$autosrobado->id}}</h1>
        <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action list-group-item-primary">Marca: {{$autosrobado->Marca}}</li>
            <li class="list-group-item list-group-item-action list-group-item-primary">Modelo: {{$autosrobado->Modelo}}</li>
            <li class="list-group-item list-group-item-action list-group-item-warning">Fecha de robo: {{$autosrobado->Fecha_robo}}</li>
            <li class="list-group-item list-group-item-action list-group-item-danger" >Estatus: {{$autosrobado->Estatus}}</li>
        </ul>
        

        <a class="btn btn-xl btn-success" href="{{ route('autosrobados.ubicacion', $autosrobado) }}">Añadir ubicacion</a>

        <div class="text-center">
            <a href="{{route('autosrobados.index')}} " class="btn btn-success">Regresar</a>
            <a href="{{route('autosrobados.edit', $autosrobado->id)}}"  class="btn btn-warning" >Editar</a><br><br>
        </div>
        <form action="{{route('autosrobados.destroy', $autosrobado->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="text-center">
                <button type="submit" class="btn btn-danger ">Eliminar</button>
            </div>
        </form>
        
    </body> 
</x-a-layout>