<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamo';
    protected $fillable = ['libro_id','estudiante_id','encargado_id','estado'];

    //relacion 1:1 libro pertenece a prestamo
    public function libro(){
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    //relacion 1:1 estudiante pertece a prestamo
    public function estudiante(){
        return $this->belongsTo(Estudiante::class, 'estudiante_id');
    }

    //relacion 1:1 encargado pertenece a prestamo
    public function encargado(){
        return $this->belongsTo(Encargado::class, 'encargado_id');
    }
    
}
