<x-a-layout>
    <body>
        <h1 class="display-4 text-center text-warning">Modifiquemos los datos del auto</h1>

        <!-- <a href="/informacion">Información</a> -->
        <section>
            <form method="POST" action="{{ route('autosrobados.update', $autosrobado) }}" enctype="multipart/form-data"><!-- /recibe-contacto -->
                <div class="col-auto">
                    @csrf 
                    <!-- Este es un meto de hace un input oculto con token de validacion de origen de peticion -->
                    <!-- Este hace un token para que podmaso pasar el perimetro de seguridad -->
                    @method('PATCH')
                    <!-- Input oculto para poder hacer el edit en la base de datos -->
                    <label for="marca">Marca:</label><input class="form-control mb-2" style="width: 50%"  name='marca' type="text" value="{{$autosrobado->Marca }}">
                    @error('marca')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-auto">
                    <label for="modelo">Modelo:</label><input class="form-control mb-2" style="width: 50%"  name='modelo'  type="text" value="{{$autosrobado->Modelo }}">
                    @error('modelo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-auto">
    
                    <label for="fecha">Feca de robo:</label><input class="form-control mb-2" style="width: 30%"   name='fecha' type="date" value="{{$autosrobado->Fecha_robo}}"><br>
                    @error('fecha')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-auto">
            
                    <label for="estatus">Estatus:</label>
                    <select name="estatus" id="estatus" class="form-control mb-2" style="width: 30%" >
                        <option value="Robada" @selected($autosrobado->Estatus == 'Robada')>Robada</option>
                        <option value="Recuperada" @selected($autosrobado->Estatus == 'Recuperada')>Recuperada</option>
                        <option value="Sin_reporte" @selected($autosrobado->Estatus == 'Sin_reporte')>Sin reporte</option>
                    </select>
                </div>

                <hr>
                <h3>Archivos</h3>
                <label for="archivo">Carga de Archivo:</label>
                <input type="file" name="archivo" id="archivo">
                <div class="text-center">
                    <button type="submit" value="enviar" id="submit" class="btn btn-warning"  >Enviar</button>
                </div>
            </form>
            <br>
            <div class="text-center">
                <a href="{{route('autosrobados.show', $autosrobado)}}" class="btn btn-success">Regresar</a>
            </div>

        </section>
        
    </body>
</x-a-layout>