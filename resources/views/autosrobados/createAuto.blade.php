
<x-a-layout>
    <body>
        <h1 class="display-4 text-center text-success">Indica el auto que quieres reportar</h1>

        <!-- <a href="/informacion">Información</a> -->
        <section>
            <form method="POST" action="{{route('autosrobados.store')}}" enctype="multipart/form-data"><!-- /recibe-contacto -->
            <div class="col-auto">
                @csrf 
                <!-- Este es un meto de hace un input oculto con token de validacion de origen de peticion -->
                <!-- Este hace un token para que podmaso pasar el perimetro de seguridad -->
                <label for="marca">Marca:</label><input value="{{old('marca')}}" class="form-control mb-2" style="width: 50%"  name='marca' type="text" >
                @error('marca')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-auto">
                <label for="modelo">Modelo:</label><input value="{{old('modelo')}}" class="form-control mb-2" style="width: 50%" name='modelo'  type="text" >
                @error('modelo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-auto">
                <label for="fecha_robo">Feca de robo:</label><input value="{{old('fecha_robo')}}" class="form-control mb-2" style="width: 30%" name='fecha_robo' type="date" ><br>
                @error('fecha')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> 
            <div class="col-auto">
                <label for="estatus">Estatus:</label>
                <select name="estatus" id="estatus" class="form-control mb-2 " style="width: 30% ">
                    <option value="Robada" @selected(old('estatus') == 'Robada')>Robada</option>
                    <option value="Recuperada" @selected(old('estatus') == 'Recuperada')>Recuperada</option>
                    <option value="Sin_reporte" @selected(old('estatus') == 'Sin_reporte')>Sin reporte</option>
                </select>
                @error('estatus')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-auto">
                <label for="correo" style=" margin: 15px">Correo de contacto:</label><input value="{{old('correo')}}" class="form-control mb-2" style="width: 30%; margin: 15px" name='correo' type="maile" ><br>
                @error('correo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <hr>
            <h3>Selecciona la imagen del auto robado</h3>

            <div class="mb-3">
                <label for="archivo" class="form-label">Carga de Archivo:</label>
                <input class="form-control " type="file" name="archivo" id="archivo" style="width: 30%; height: 20%">
            </div>
            
                <div class="text-center">
                    <button type="submit" value="enviar" id="submit" class="btn btn-warning"  >Enviar</button>
                </div>
            </form>
        </section>
        <br>
        <div class="text-center">
            <a href="{{route('autosrobados.index')}}" class="btn btn-success">Regresar</a>
        </div>
    </body>
</x-a-layout>