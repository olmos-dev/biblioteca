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

}
