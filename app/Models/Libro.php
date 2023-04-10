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
}
