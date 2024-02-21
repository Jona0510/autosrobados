<?php

namespace App\Http\Controllers;

use App\Models\Autosrobado;
use Illuminate\Http\Request;

class AutosrobadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('autosrobados/indexAuto');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autosrobados/createAuto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auto = new Autosrobado();
        $auto->marca = $request->input('marca');
        $auto->modelo = $request->input('modelo');
        $auto->fecha_robo = $request->input('fecha');
        $auto->estatus = $request->input('estatus');
        $auto->save();
        return "Auto registrado";
    }

    /**
     * Display the specified resource.
     */
    public function show(Autosrobado $autosrobado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autosrobado $autosrobado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autosrobado $autosrobado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autosrobado $autosrobado)
    {
        //
    }
}
