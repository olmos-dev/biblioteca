<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Requests\LibroRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LibroUpdateRequest;
use Illuminate\Support\Facades\File;

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

        //inserta los datos del libro en la BD
        $libro = Libro::create([
            'isbn' => $validado['isbn'],
            'titulo' => $validado['titulo'],
            'autor' => $validado['autor'],
            'editorial' => $validado['editorial']
        ]);

        //inserta los datos de la imagen del libro
        $libro->image()->create([
            'path' => $nombre,
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
    public function update(LibroUpdateRequest $request, Libro $libro)
    {
        //validación
        $validado = $request->validated();

        if($request->hasFile('portada')){
            //return 'se ha subido una nueva portada';

            //La imagen se obtiene del request
            $portada = $request->file('portada');
            //Se renombre la imagen
            $renombrar = time().'.'.$validado['portada']->extension();
            //Se almacena la imagen en el storage
            $portada->move(public_path('storage/images/portadas'),$renombrar);
            
            //se busca la portada actual del libro
            $portada = $libro->image;
            //se elimina la portada actual del libro
            File::delete('storage/images/portadas/'.$portada->path);
            //se actualiza el path de la portada del libro
            $portada->update([
                'path' => $renombrar
            ]);
        }

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
