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

        $autosrobado = Autosrobado::all();
        return view('autosrobados.indexAuto', compact('autosrobado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autosrobados.createAuto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validacion 

        $request->validate([
            'marca' => 'required|string|min:2|max:12',
            'modelo' => 'required',
            'fecha' => 'required|date',
            'estatus' => 'required'
        ]);

        $auto = new Autosrobado();
        $auto->marca = $request->marca;
        $auto->modelo = $request->modelo;
        $auto->fecha_robo = $request->fecha;
        $auto->estatus = $request->estatus;
        $auto->save();
        return redirect()->route('autosrobados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autosrobado $autosrobado)
    {
        return view('autosrobados.showAuto', compact('autosrobado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autosrobado $autosrobado)
    {
        return view('autosrobados.editAuto', compact('autosrobado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autosrobado $autosrobado)
    {
        
        $request->validate([
            'marca' => 'required|string|min:2|max:12',
            'modelo' => 'required',
            'fecha' => 'required|date',
            'estatus' => 'required'
        ]);

        $autosrobado->marca = $request->marca;
        $autosrobado->modelo = $request->modelo;
        $autosrobado->fecha_robo = $request->fecha;
        $autosrobado->estatus = $request->estatus;
        $autosrobado->save();

        return redirect()->route('autosrobados.show', $autosrobado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autosrobado $autosrobado)
    {
        $autosrobado->delete();
        return redirect()->route('autosrobados.index');
    }
}
