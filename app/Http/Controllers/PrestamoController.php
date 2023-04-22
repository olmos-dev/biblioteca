<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\PrestamoStoreRequest;
use App\Models\Stock;
use PhpParser\Node\Expr\New_;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //se obtiene los detalles del prestamo
        $prestamos = Prestamo::with('libro:id,isbn,titulo','estudiante:id,matricula,nombre,a_paterno,a_materno','encargado:id,nombre')
                                ->orderBy('created_at','desc')
                                ->get(['id','libro_id','estudiante_id','encargado_id','estado','created_at']);

        return view('prestamo.index',compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //se obtienen los estudiantes
        $estudiantes = Estudiante::orderBy('a_paterno','asc')
                                    ->get(['id','matricula','nombre','a_paterno','a_materno']);

        //se obtienen los libros del stock
        $libros = Libro::with('stock')
                            ->whereHas('stock',function(Builder $query){
                                $query->where('disponible','!=',0);
                            })
                            ->orderby('titulo','asc')
                            ->get(['id','isbn','titulo']);

        return view('prestamo.create',compact('estudiantes','libros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrestamoStoreRequest $request)
    {
        //se obtienen los datos del formulario y se validan
        $validados = $request->validated();

        //se obtiene el stock del libro
        $stock = Stock::stockLibro($validados['libro']);

        //se realiza el prestamo del libro
        Prestamo::create([
            'libro_id' => $validados['libro'],
            'estudiante_id' => $validados['estudiante'],
            'encargado_id' => Auth::user()->id,
            'estado' => 1 //1 es prestado 0 es entregado
        ]);

        //se resta un al stock del libro
        $stock->update([
            'disponible' => $stock->disponible - 1,
            'prestado' => $stock->prestado + 1
        ]);

        return redirect()->route('prestamo.index')->with('mensaje','Prestamo se ha realizado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }

    //me permite actulizar el estado del libro
    public function estado(Prestamo $prestamo){
        //se actualiza el estado del libro
        $prestamo->update([
            'estado' => 0
        ]);

        //se buscar el libro en el stock
        $stock = Stock::stockLibro($prestamo->libro_id);

        //se actualiza el estado del libro en el stock
        $stock->update([
            'disponible' => $stock->disponible + 1,
            'prestado' => $stock->prestado - 1
        ]);

        //se retorna una respuesta json con el codigo de estado 200
        return response()->json($stock,200);
    }
}
