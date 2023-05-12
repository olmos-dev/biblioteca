<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
     //se define el constructor para el middleare admin
     public function __construct(){
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Encargado $encargado)
    {
        $encargado = Encargado::select('nombre','apellido_paterno','apellido_materno')->where('user_id',auth()->user()->id)->first();
        $rol = User::esAdmin();
        return view('perfil.show',compact('encargado','rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $encargado = auth()->user()->encargado;
        return view('perfil.edit',compact('encargado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //se realiza la validacion de los campos
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:30'],
            'apaterno' => ['required', 'string', 'max:30'],
            'amaterno' => ['required', 'string', 'max:30'],
        ]);

        //se autaliza el perfil del encargado logueado
        auth()->user()->encargado->update([
            'nombre' => $validated['nombre'],
            'apellido_paterno' => $validated['apaterno'],
            'apellido_materno' => $validated['amaterno']
        ]);

        //una redirecion con una alerta
        return redirect()->route('perfil.show')->with('biblioteca','Nombre actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encargado $encargado)
    {
        //
    }
    
}
