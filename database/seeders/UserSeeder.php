<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Users\USR_Info;
use App\Models\Users\USR_Rol;
use App\Models\Users\USR_UserRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        USR_Rol::insert([
            ['name' => 'Administrador'],
            ['name' => 'Gestor de estudiantes'],
            ['name' => 'Gestor de docentes'],
            ['name' => 'Gestor de plataforma'],
            ['name' => 'Gestor de contenido'],
            ['name' => 'Seguridad'],
        ]);

        USR_Info::factory()
            ->count(1010)
            ->create();


        USR_UserRoles::insert([
            ['userId' => 1001, 'rolId' => 1],
            ['userId' => 1002, 'rolId' => 1],
            ['userId' => 1003, 'rolId' => 1],
            ['userId' => 1004, 'rolId' => 1],
            ['userId' => 1005, 'rolId' => 1],

            ['userId' => 1006, 'rolId' => 2],

            ['userId' => 1007, 'rolId' => 3],

            ['userId' => 1008, 'rolId' => 4],

            ['userId' => 1009, 'rolId' => 5],

            ['userId' => 1010, 'rolId' => 4],
            ['userId' => 1010, 'rolId' => 5],
        ]);
    }
}
