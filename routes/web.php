<?php


use App\Http\Controllers\AutosrobadoController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/formulario', function () {
//     return view('formulario');
// });

// Route::post('/recibe-auto',function(Request $request){
//     $auto = new Autosrobado();
//     $auto->marca = $request->input('marca');
//     $auto->modelo = $request->input('modelo');
//     $auto->fecha_robo = $request->input('fecha');
//     $auto->estatus = $request->input('estatus');
//     $auto->save();
//     return "Auto registrado";
// });

Route::resource('autosrobados', AutosrobadoController::class);



Route::get('autosrobados/{autosrobado}/ubicacion', [AutosrobadoController::class, 'showP'])
->name('autosrobados.ubicacion');

Route::post('autosrobados/{autosrobado}/addUbiacion', [AutosrobadoController::class, 'addUbicacion'])
    ->name('autosrobados.seleccionar-ubicacion');

Route::get('autosrobados/ver/ubicaciones', [AutosrobadoController::class, 'porubicacion'])
    ->name('autosrobados.ver');

Route::get('autosrobados/ver/ubicaciones/autos', [AutosrobadoController::class, 'viewlocation'])
    ->name('autosrobados.ver-ubicacion');

Route::get('autosrobados/detalles/{autosrobado}', [AutosrobadoController::class, 'showdetalles'])
    ->name('autosrobados.detalles');
 
Route::get('descargar/{archivo}', [AutosrobadoController::class, 'descarga'])
    ->name('comentario.descarga');

//Route::resource('locations', LocationController::class);	

// Route::get('materia/{materia}/inscribir-alumnos', [LocationController::class, 'inscribirAlumnos'])
//     ->name('materia.inscribir-alumnos');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Route::get('demo', function () {
//     return view('landing');
// })->name('landing');