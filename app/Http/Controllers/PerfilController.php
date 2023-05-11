<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
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
    public function edit(Encargado $encargado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encargado $encargado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encargado $encargado)
    {
        //
    }
    
}
