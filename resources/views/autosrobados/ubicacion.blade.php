<x-a-layout>
    <h1 class="display-3 text-center text-info">Auto seleccionado {{$auto->id}}</h1>

    <form action="{{ route('autosrobados.seleccionar-ubicacion', $auto) }}" method="POST">
        @csrf
        <select name="ubicacion_id[]" multiple>
            @foreach ($ubicaciones as $ubicaciones)
                <option value="{{ $ubicaciones->id }}">{{ $ubicaciones->Ubicaciones }}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" value="Añadir Ubicación">
    </form>

</x-a-layout>