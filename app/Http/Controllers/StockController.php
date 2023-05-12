<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use Illuminate\Support\Facades\Gate;
use function PHPUnit\Framework\isEmpty;

use Illuminate\Database\Eloquent\Builder;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StockController extends Controller
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
        $asignados = Stock::with('libro')
                            ->filtrarStock($buscar)
                            ->orderBy('created_at','asc')
                            ->paginate(10);

        return view('stock.index',compact('asignados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //solo muestra los libros que no han sido asignados
        $libros = Libro::select('id','isbn','titulo')
                            ->with('image:id,path,imageable_type,imageable_id')
                            ->whereDoesntHave('stock')
                            ->orderby('titulo','asc')
                            ->get();
                            
        return view('stock.create',compact('libros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockRequest $request)
    {
        //se realiza la validacion del libro
        $validacion = $request->validated();

        //se busca el libro por el isbn para extraer el id
        $libro = Libro::select('id')->where('isbn',$validacion['libro'])->first();

        //se almacena en la base de datos
        Stock::create([
            'libro_id' => $libro->id,
            'cantidad' => $validacion['cantidad'],
            'disponible' => $validacion['cantidad'],
            'prestado' => 0
        ]);

        //redireccionar
        return redirect()->route('stock.index')->with('mensaje','se asigno un libro al stock');


    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //$stock = Stock::with('libro')->where('stock_id',$stock->id)->first();
        $stock = Stock::with('libro')->where('id',$stock->id)->first();
        return view('stock.show',compact('stock'));
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
    public function destroy(Stock $stock)
    {
        //se elimina el libro del stock
        $stock->delete();
        //se retorna la respuesta en json para saber que libro del stock se ha eliminado
        return response()->json($stock,200);
    }

    //permite incrementar la cantidad de los libros en el stock
    public function increase(Request $request,Stock $stock){        
        if($request->ajax()){
            //se incrementa el stock
            $stock->update([
                'cantidad' => $stock->cantidad + 1,
                'disponible' => $stock->disponible + 1
            ]);
            return response()->json($stock,200);
        }

        //no se puede procesar la solicitud
        return abort(500);
       
    }

    //permite decrementar la cantidad de los libros en el stock
    public function decrementar(Request $request,Stock $stock){        
        if($request->ajax()){
            if ($stock->cantidad != 1)
                $stock->update([
                    'cantidad' => $stock->cantidad - 1,
                    'disponible' => $stock->disponible - 1
                ]);

            return response()->json($stock,200);
        }

        //no se puede procesar la solicitud
        return abort(500);
    }

}
