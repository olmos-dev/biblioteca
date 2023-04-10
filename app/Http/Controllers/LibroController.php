<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Requests\LibroRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all();
        return view('libro.index',compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LibroRequest $request)
    {
        //validación
        $validado = $request->validated();

        /**almacenar la imagen en el storage */
        //La imagen se obtiene del request
        $portada = $request->file('portada');
        //Se crea un nuevo nombre para la imagen
        $nombre = time().'.'.$validado['portada']->extension();
        /**Se almacena la imagen en la ruta*/
        $portada->move(public_path('storage/images/portadas'),$nombre);

        //insertar el libro en la BD
        $libro = Libro::create([
            'isbn' => $validado['isbn'],
            'titulo' => $validado['titulo'],
            'autor' => $validado['autor'],
            'editorial' => $validado['editorial']
        ]);

        //inserta los datos de la imagen del libro
        $libro->image()->create([
            'url' => $nombre,
            'imageable_id' => $libro->id,
            'imageable_type' => get_class($libro)
        ]);

        //redireccionar
        return redirect()->route('libro.index')->with('mensaje','un nuevo libro se ha agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libro.edit',compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LibroRequest $request, Libro $libro)
    {
        //validación
        $validado = $request->validated();
        //actualizar el libro en la BD
        $libro->update([
            'isbn' => $validado['isbn'],
            'titulo' => $validado['titulo'],
            'autor' => $validado['autor'],
            'editorial' => $validado['editorial']
        ]);
        //redireccionar
        return redirect()->route('libro.index')->with('mensaje','el libro se ha actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
