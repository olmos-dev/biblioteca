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
    
}
