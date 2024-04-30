<x-a-layout>
    <body>

        <h1>Locations</h1>
        <select name="ubucacion" multiple>
            @foreach ($location as $location)
                <option value="{{ $location->id }}">{{ $location->Ubicaciones }}</option>
            @endforeach
        </select>
        <ul>
            <li>{{ $auto->Marca }}</li>
        </ul>

        <!-- <a href="{{ route('locations.create') }}">Create location</a> -->
        
    </body>
</x-a-layout>