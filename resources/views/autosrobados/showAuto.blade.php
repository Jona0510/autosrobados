<x-a-layout>
    <body>
        <h1 class="display-3 text-center text-info">Auto seleccionado {{$autosrobado->id}}</h1>
        <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action list-group-item-primary">Marca: {{$autosrobado->Marca}}</li>
            <li class="list-group-item list-group-item-action list-group-item-primary">Modelo: {{$autosrobado->Modelo}}</li>
            <li class="list-group-item list-group-item-action list-group-item-warning">Fecha de robo: {{$autosrobado->Fecha_robo}}</li>
            <li class="list-group-item list-group-item-action list-group-item-danger" >Estatus: {{$autosrobado->Estatus}}</li>
            
            <li class="list-group-item list-group-item-action list-group-item-danger" >Ubicacion de robo:
                @foreach($autosrobado->locations as $ubicacion)
                    {{ $ubicacion->Ubicaciones }}
                @endforeach 
            </li>
        </ul>

        <h3 style="display: block; margin: 20px auto;">Descarga la imagen</h3>
        <ul>
            @foreach ($autosrobado->archivos as $archivo)
                <li>
                    <a href="{{ route('comentario.descarga', $archivo) }}">
                        {{ $archivo->nombre_original }}
                    </a>
                </li>
            @endforeach
        </ul>

        <h3 class="display-5 text-center">Auto Robado:</h3> <img src="{{ \Storage::url($autosrobado->archivos->first()->ubicacion) }}" width="500px" style="display: block; margin: 5px auto;border-radius: 10px" >
        

        

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