<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Libro;
use App\Models\Stock;
use App\Models\Prestamo;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\PrestamoStoreRequest;
use App\Http\Requests\PrestamoUpdateRequest;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //se cargan los estados para el prestamo
        $estados = DB::table('estado')->get(['id','valor','nombre']);
        
        //los parametros de busqueda
        $estado = $request->estado ?? null;
        $libro = $request->libro ?? null;
        $estudiante = $request->estudiante ?? null;
        $fecha = $request->fecha ?? null;

        //se obtiene los detalles del prestamo
        $prestamos = Prestamo::with('libro:id,isbn,titulo','estudiante:id,matricula,nombre,a_paterno,a_materno','encargado:id,nombre')
                                ->filtro($estado,$libro,$estudiante,$fecha)
                                ->orderBy('created_at','desc')
                                ->paginate(2,['id','libro_id','estudiante_id','encargado_id','estado','created_at']);

        return view('prestamo.index',compact('prestamos','estados'));
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

        return view('prestamo.edit',compact('estudiantes','libros','prestamo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrestamoUpdateRequest $request, Prestamo $prestamo)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //se verifica si estado es prestado
        if ($prestamo->estado == 1){
            //se buscar el libro en el stock
            $stock = Stock::stockLibro($prestamo->libro_id);

            //se vuelve al estado anterior del libro en el stock
            $stock->update([
                'disponible' => $stock->disponible + 1,
                'prestado' => $stock->prestado - 1
            ]);
        }

        //se elimina el prestamo
        $prestamo->delete();

        //se envia una respuesta json con estado de codigo 200
        return response()->json($prestamo,200);
    }

    //me permite actulizar el estado del libro
    public function estado(Prestamo $prestamo){
        
        //se busca el libro en el stock
        $stock = Stock::stockLibro($prestamo->libro_id);

        if($prestamo->estado == 1){//de estado prestado pasa a devuelto
            
            //el libro se devuelve
            $prestamo->update([
                'estado' => 0
            ]);

            //se actualiza el estado del libro en el stock
            Stock::estadoDevolver($stock);

            //se retorna una respuesta json con el codigo de estado 200
            return response()->json([
                'value' => true
            ],200);

        }else{//devuelto pasa a prestado
            
            if($stock->disponible-1 >= 0){//no se puede prestar mas libros; si el libro esta agotado del stock
                
                //el libro se prestado
                $prestamo->update([
                    'estado' => 1
                ]);

                //se actualiza el estado del libro en el stock
                Stock::estadoPrestado($stock);

                //se retorna una respuesta json con el codigo de estado 200
                return response()->json([
                    'value' => false
                ],200);

            }else{
                //no es posible prestar mas libros, el stock esta agotado
                return response()->json($prestamo,500);
            }
        }    
    }
}
