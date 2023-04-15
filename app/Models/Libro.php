<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libro';
    protected $fillable = ['isbn','titulo','autor','editorial'];

    /**
    * La imagen del libro.
    */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get the user associated with the Libro
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stock(){
        return $this->hasOne(Stock::class);
    }

    /**Se usara una ruta amigable en vez del id */
    public function getRouteKeyName()
    {
        return 'isbn';
    }

    public function scopeFiltrar($query,$buscar){
        return $query->where('titulo','like',"%$buscar%")
                        ->orWhere('autor','like',"%$buscar%")
                        ->orWhere('editorial','like',"%$buscar%");
    }
    
}
