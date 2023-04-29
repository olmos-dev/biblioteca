<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeFiltro(Builder $query, $estado,$libro,$estudiante,$fecha){
        
        //si el usuario busca por ina fecha en especifico de lo contrario se monstran todos los registros
        if($fecha != null){
            $query->where('estado','like',"%$estado%")
            ->whereDate('created_at',$fecha)
            ->whereHas('libro',function($query) use($libro){
                $query->where('isbn','like',"%$libro%")->orWhere('titulo','like',"%$libro");
            })
            ->whereHas('estudiante',function($query) use($estudiante){
                $query->where('matricula','like',"%$estudiante%")->orWhere('a_paterno','like',"%$estudiante%");
            });
        }else{
            $query->where('estado','like',"%$estado%")
            ->whereHas('libro',function($query) use($libro){
                $query->where('isbn','like',"%$libro%")->orWhere('titulo','like',"%$libro");
            })
            ->whereHas('estudiante',function($query) use($estudiante){
                $query->where('matricula','like',"%$estudiante%")->orWhere('a_paterno','like',"%$estudiante%");
            });
        }
    }
}
