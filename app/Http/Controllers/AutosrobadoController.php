<?php

namespace App\Http\Controllers;

use App\Mail\RegistroAuto;
use App\Models\archivo;
use App\Models\Autosrobado;
use App\Models\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AutosrobadoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['porubicacion','viewlocation','showdetalles']);
    
    }
        
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //DB::enableQueryLog();

        $autosrobado = Autosrobado::where('user_id', Auth::id())
        ->with('user:id,name')
        ->get();

        // foreach ($autosrobado as $auto) {
        //     $auto->user->name;
        // }
        // dd(DB::getQueryLog());
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
            'fecha_robo' => 'required|date',
            'estatus' => 'required',
            'correo' => 'required|email',
            'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png'

        ]);
        



        $request->merge(['user_id' => Auth::id()]);
        $autorobado = Autosrobado::create($request->all());
        

        // $auto = new Autosrobado();
        // $auto->marca = $request->marca;
        // $auto->modelo = $request->modelo;
        // $auto->fecha_robo = $request->fecha;
        // $auto->estatus = $request->estatus;
        // $auto->user_id = Auth::id();
        // $auto->save();

    
        
        if ($request->file('archivo')->isValid()) {
            $ruta = $request->archivo->store('', 'public');

            $archivo = new archivo();
            $archivo->ubicacion = $ruta;
            $archivo->nombre_original = $request->archivo->getClientOriginalName();
            $archivo->mime = $request->archivo->getClientMimeType();
            $archivo->autosrobado_id = $autorobado->id;
            $archivo->save();
        }

        return redirect()->route('autosrobados.ubicacion',$autorobado->id); //Edite aqui lo del index, deber redireccionar al index pero el otro 

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Autosrobado $autosrobado)
    {
        //DB::enableQueryLog();

        $this->authorize('view', $autosrobado);
        $autosrobado->load('locations');

        // foreach ($autosrobado->locations as $auto) {
        //     $auto->Ubicaciones;
        // }
        // dd(DB::getQueryLog());
        return view('autosrobados.showAuto', compact('autosrobado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autosrobado $autosrobado)
    {
        $this->authorize('update', $autosrobado);
        return view('autosrobados.editAuto', compact('autosrobado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autosrobado $autosrobado)
    {

        //dd($request->all());
        //dd($request->file('archivo')->isValid());
        $this->authorize('update', $autosrobado);

        $request->validate([
            'marca' => 'required|string|min:2|max:12',
            'modelo' => 'required',
            'fecha' => 'required|date',
            'estatus' => 'required',
            'archivo' => 'required|file|mimes:pdf,jpg,jpeg,png'
        ]);

        if ($request->file('archivo')->isValid()) {

            foreach ($autosrobado->archivos as $archivo) {

                Storage::delete($archivo->ubicacion); 

                $ruta = $request->archivo->store('', 'public'); 
                $archivo->ubicacion = $ruta;
                $archivo->nombre_original = $request->archivo->getClientOriginalName();
                $archivo->mime = $request->archivo->getClientMimeType();
                $archivo->autosrobado_id = $autosrobado->id;
                $archivo->save();
            }
        }


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
        $this->authorize('delete', $autosrobado);
        $autosrobado->delete();
        return redirect()->route('autosrobados.index');
    }

    public function showP($id)
    {
        $auto = Autosrobado::findOrFail($id);
        $ubicaciones = location::all(); 
        

        $this->authorize('update', $auto);
        
        return view('autosrobados.ubicacion', compact('auto','ubicaciones'));
    }

    public function addUbicacion(Request $request,$id)
    {
        $request->validate([
            'ubicacion_id' => 'required|exists:locations,id'
        ]);

        $autosrobado = Autosrobado::findOrFail($id);
        
        $autosrobado->locations()->attach($request->ubicacion_id);

        Mail::to($autosrobado->correo)->send(new RegistroAuto($autosrobado));
        return redirect()->route('autosrobados.index');
    }

    public function porubicacion()
    {

        $ubicaciones = location::all();
        return view('autosrobados.verubicacion',compact('ubicaciones'));
    }

    public function viewlocation(Request $request)
    {

        $autosrobado = Autosrobado::whereHas('locations', function($query) use ($request){
            $query->where('id', $request->ubicacion);
        })->get(); 
        return view('autosrobados.autoubicacion', compact('autosrobado'));
    }

    public function showdetalles(Autosrobado $autosrobado)
    {
        $autosrobado->load('locations');
        $autosrobado->load('archivos');
        //dd($autosrobado->all());
        return view('autosrobados.detalles', compact('autosrobado'));
    }

    public function descarga(archivo $archivo)
    {
        return response()
            ->download(storage_path('app/public/' . $archivo->ubicacion), $archivo->nombre_original);
    }
}
