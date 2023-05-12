<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\FotoPerfilRequest;

class FotoPerfilController extends Controller
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
        return view('perfil.foto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FotoPerfilRequest $request)
    {
        if(auth()->user()->image != null)
            //una redirecion con una alerta
            return redirect()->route('perfil.show')->with('biblioteca','No se pudo subir. Ya existe una foto');

        //validación
        $validado = $request->validated();

        /**almacenar la imagen en el storage */
        //La imagen se obtiene del request
        $foto = $request->file('foto');
        //Se crea un nuevo nombre para la imagen
        $nombre = time().'.'.$validado['foto']->extension();
        /**Se almacena la imagen en la ruta*/
        $foto->move(public_path('storage/images/perfiles'),$nombre);

        //se busca el usuario logueado
        $usuario = auth()->user();
        //se le asigna la foto de perfil al usuario logueado y se almacena la información en la BD
        $usuario->image()->create([
            'path' => $nombre,
            'imageable_id' =>  $usuario->id,
            'imageable_type' => get_class($usuario)
        ]);
        
        //una redirecion con una alerta
        return redirect()->route('perfil.show')->with('biblioteca','Foto de perfil cargada correctamente');

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
    public function destroy()
    {
        //se busca la foto actual del encargado
        $foto = auth()->user()->image;

        //si el usuario no tiene ninguna foto en la BD ni en el storage
        if($foto === null)
            //una redirecion con una alerta
            return redirect()->route('perfil.show')->with('biblioteca','No se pudo eliminar. No existe una foto');
        
            //se elimina la foto actual del storage
        File::delete('storage/images/perfiles/'.$foto->path);
        //se elimina la portada del libro de la >BD
        $foto->delete();
        //una redirecion con una alerta
        return redirect()->route('perfil.show')->with('biblioteca','Foto de perfil eliminada');

    }

}
