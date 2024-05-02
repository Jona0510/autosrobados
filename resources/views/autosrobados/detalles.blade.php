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

        <form action="{{route('autosrobados.ver-ubicacion')}}" method="GET">
        <select name="ubicacion" id="ubicacion" hidden>
            @foreach($autosrobado->locations as $ubicacion)
                <option value="{{ $ubicacion->id }}">{{ $ubicacion->Ubicaciones }}</option>
            @endforeach
        </select>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Regresar</button>
        </div>
    </form>
        
    </body> 
</x-a-layout>