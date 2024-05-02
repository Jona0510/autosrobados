<x-a-layout>
    
    <div class="col-auto">
        <form action="{{route('autosrobados.ver-ubicacion')}}" method="GET">
            <label for="ubicacion">Selecciona una ubicación:</label>
            <select name="ubicacion" id="ubicacion" class="form-control mb-2 " style="width: 30%">
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion->id }}">{{ $ubicacion->Ubicaciones }}</option>
                @endforeach
            </select>
            <div class="text-center">
                    <button type="submit" value="enviar" id="submit" class="btn btn-warning"  >Ver autos</button>
                </div>
        </form>
    </div>
</x-a-layout>