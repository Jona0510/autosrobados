<x-a-layout>
    <h1 class="display-3 text-center text-info">Auto seleccionado {{$auto->Marca}}</h1>
    <div class="col-auto">
        <label for="ubicacion_id[]">Selecciona la ubicacion del robo del auto:</label>
        <form action="{{ route('autosrobados.seleccionar-ubicacion', $auto) }}" method="POST">
            @csrf
            <select name="ubicacion_id[]" multiple class="form-control mb-2 " style=" background-color: #f8f9fa; color: #495057; border-radius: 10px; padding: 10px; width: 20%">
                @foreach ($ubicaciones as $ubicaciones)
                    <option value="{{ $ubicaciones->id }}">{{ $ubicaciones->Ubicaciones }}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" class="btn btn-primary" value="Añadir Ubicación">
        </form>
    </div>
    

</x-a-layout>