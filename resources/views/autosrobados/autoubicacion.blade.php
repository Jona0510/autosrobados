<x-a-layout>
        <table class="table table-striped table-dark">
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
                    <td><a href="{{route('autosrobados.detalles', $auto)}}" class="btn btn-info">Ver detalles</a></td> 
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <a href="{{route('autosrobados.ver')}} " class="btn btn-success">Regresar</a>
        </div>
</x-a-layout>