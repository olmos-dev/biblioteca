<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Encargado;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            //validacion para los datos de encargado
            'nombre' => ['required', 'string', 'max:30'],
            'materno' => ['required', 'string', 'max:30'],
            'paterno' => ['required', 'string', 'max:30'],
        ])->validate();

        $usuario = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        //se agregan a la BD los datos del encargado
        Encargado::create([
            'user_id' => $usuario->id,
            'nombre' => $input['nombre'],
            'apellido_materno' => $input['materno'],
            'apellido_paterno' => $input['paterno'],
        ]);

        //asignar el rol - por defecto el rol es de tipo encargado
        DB::insert('insert into rol_user (user_id, rol_id) values (?, ?)', [$usuario->id,2]);
        
        return $usuario;
    }
}
