<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\User;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            ['nombre'=> 'admin'],
            ['nombre' => 'usuario']
        ];

        foreach ($roles as $rol){
            Rol::create($rol);
        }

        $usuarios = [
            [
                'name'=> 'Admin',
                'email' => 'administrador@gmail.com',
                'password' => bcrypt('123123'),
                'rol_id' => 1
            ],
            [
                'name'=> 'Usuario Prueba',
                'email' => 'usuario@gmail.com',
                'password' => bcrypt('123123'),
                'rol_id' => 2
            ],

        ];

        foreach ($usuarios as $usuario){
            User::create($usuario);
        }


    }
}
