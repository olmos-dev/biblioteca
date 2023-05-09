<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\{Rol};
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relacion uno a uno - un Usuario tiene un Encargado
    public function encargado()
    {
        return $this->hasOne(Encargado::class,'user_id');
    }

    //relacion muchos a muchos - un usuario tiene muchos roles
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_user', 'user_id', 'rol_id');
    }

    //es un método para obtener el rol del usuario autenticado
    public static function esAdmin(){
        return Auth::user()->roles[0]->tipo;
    }

}
