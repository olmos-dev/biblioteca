<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiante';
    protected $fillable = ['matricula','nombre','a_paterno','a_materno'];

    /**Se usara una ruta amigable en vez del id */
    public function getRouteKeyName()
    {
        return 'matricula';
    }

    //buscar estudiantes por matricula, nombre o apellido paterno
    public function scopeFiltrar($query,$buscar){
        return $query->where('nombre','like',"%$buscar%")
                        ->orWhere('a_paterno','like',"%$buscar%")
                        ->orWhere('matricula','like',"%$buscar%");
    }
    
}
