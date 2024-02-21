<?php

use App\Http\Controllers\AutosrobadoController;
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
