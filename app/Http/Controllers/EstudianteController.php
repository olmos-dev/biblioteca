<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    //se define el constructor para el middleare admin
    public function __construct(){
        $this->middleware('admin', ['except' => ['index', 'show']]);
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar ?? null;

        $estudiantes = Estudiante::select('matricula','nombre','a_paterno','a_materno')
                                    ->filtrar($buscar)
                                    ->orderBy('nombre','asc')
                                    ->paginate(10);

        return view('estudiante.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //'email' => 'unique:users,email_address,'.$user->id
        //validacion de los campos
        $validated = $request->validate([
            'matricula' => 'required|digits:8|unique:estudiante,matricula',
            'nombre' => ['required', 'string', 'max:30'],
            'paterno' => ['required', 'string', 'max:30'],
            'materno' => ['required', 'string', 'max:30'],
        ]);

        //se almacena en la base de datos
        Estudiante::create([
            'matricula' => $validated['matricula'],
            'nombre' => $validated['nombre'],
            'a_paterno' => $validated['paterno'],
            'a_materno' => $validated['materno']
        ]);

        //retorna una ruta
        return redirect()->route('estudiante.index')->with('mensaje','Nuevo estudiante se ha agregado');

    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        return view('estudiante.edit',compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
         //validacion de los campos
         $validated = $request->validate([
            'matricula' => 'required|digits:8|unique:estudiante,matricula,'.$estudiante->id,
            'nombre' => ['required', 'string', 'max:30'],
            'paterno' => ['required', 'string', 'max:30'],
            'materno' => ['required', 'string', 'max:30'],
        ]);

        //se almacena en la base de datos
        $estudiante->update([
            'matricula' => $validated['matricula'],
            'nombre' => $validated['nombre'],
            'a_paterno' => $validated['paterno'],
            'a_materno' => $validated['materno']
        ]);

        //retorna una ruta
        return redirect()->route('estudiante.index')->with('mensaje','Estudiante editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('estudiante.index')->with('mensaje','Estudiante eliminado');
    }
}
