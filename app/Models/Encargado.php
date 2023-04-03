<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;

    protected $table = 'encargado';
    protected $fillable = ['user_id','nombre','apellido_materno','apellido_paterno'];

    //Relacion uno a uno - un Encargado pertenece a un Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
