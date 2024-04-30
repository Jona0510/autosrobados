<?php

namespace App\Http\Controllers;

use App\Models\Autosrobado;
use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutosrobadoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    
    }
        
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        #$autosrobado = Autosrobado::all();
        $autosrobado = Autosrobado::where('user_id', Auth::id())->get();
        return view('autosrobados.indexAuto', compact('autosrobado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location = location::all();
        return view('autosrobados.createAuto', compact('location'));
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
        



        #$request->merge(['user_id' => Auth::id()]);
        #dd($request->all());
        #Autosrobado::create($request->all());
        

        $auto = new Autosrobado();
        $auto->marca = $request->marca;
        $auto->modelo = $request->modelo;
        $auto->fecha_robo = $request->fecha;
        $auto->estatus = $request->estatus;
        $auto->user_id = Auth::id();
        $auto->save();
        return redirect()->route('autosrobados.show',$auto->id); //Edite aqui lo del index, deber redireccionar al index pero el otro 

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Autosrobado $autosrobado)
    {
        $ubicaciones = location::all(); 
        return view('autosrobados.showAuto', compact('autosrobado'), compact('ubicaciones'));
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

        #Se sustituye por el Id de la tabla que pertenece
        $autosrobado->marca = $request->marca;
        $autosrobado->modelo = $request->modelo;
        #Ubicacion ID->Donde fue robado

        #Propias de esta tabla
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

    public function showP($id)
    {
        $auto = Autosrobado::findOrFail($id);
        $ubicaciones = location::all(); 
        
        return view('autosrobados.ubicacion', compact('auto'), compact('ubicaciones'));
    }

    public function addUbicacion(Request $request,$id)
    {

        $autosrobado = Autosrobado::findOrFail($id);
        //dd( $autosrobado->id);
        $autosrobado->locations()->attach($request->ubicacion_id);
        return redirect()->route('autosrobados.index');
    }
}
