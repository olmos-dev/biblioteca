<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';
    protected $fillable = ['libro_id','cantidad','disponible','prestado'];

    /**
     * Get the user that owns the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function libro(){
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    //se realiza una busqueda en el stock por el libro o el isbn
    public function scopeFiltrarStock($query,$buscar){
        return $query->whereHas('Libro',function($query) use($buscar){
            $query->where('isbn','like',"%$buscar%")->orWhere('titulo','like',"%$buscar%");
        });
    }

    //me devuelve los detalles de un libro en especifico del stock
    public static function stockLibro($libro){
        return Stock::select('id','libro_id','cantidad','disponible','prestado')
                        ->where('libro_id',$libro)->first();
    }

    //actualiza el stock cuando el libro se ha devuelto
    public static function estadoDevolver($stock){
        $stock->update([
            'disponible' => $stock->disponible + 1,
            'prestado' => $stock->prestado - 1
        ]);
    }

    //actualiza el stock cuando el libro se ha prestado
    public static function estadoPrestado($stock){
        $stock->update([
            'disponible' => $stock->disponible - 1,
            'prestado' => $stock->prestado + 1
        ]);
    }

}
