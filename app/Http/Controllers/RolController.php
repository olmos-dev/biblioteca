<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RolController extends Controller
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
        $roles = User::with('encargado','roles')
                        ->whereNot('id',auth()->user()->id)
                        ->orderBy('created_at','desc')                
                        ->get();
        //return $roles;
        return view('rol.index',compact('roles'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //se asigna un rol
    public function asignarRol(Request $request, User $usuario){
        //seguridad si es una solicitud ajax
        if($request->ajax())
            //se obtiene el rol actual
            $rol = $usuario->roles[0]->tipo;

            if($rol === 'administrador'){
                //se asigna el rol encargado
                $usuario->roles()->sync([2]);
                //se prepara la respuesta
                return response()->json(['respuesta' =>'encargado'],200);
            }else{
                //se asigna el rol administrador
                $usuario->roles()->sync([1]);
                 //se prepara la respuesta
                return response()->json(['respuesta' =>'administrador'],200);
            }
            
        return abort(404);
    }

}
