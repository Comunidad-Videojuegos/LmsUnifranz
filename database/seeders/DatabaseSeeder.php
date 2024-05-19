<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\Users\USR_AppSection::factory()->createMany([
        //     ['link' => 'config', 'name' => 'Configuraciones', 'description' => 'Pagina de nose', 'icon' => 'sliders', 'group' => 1],
        //     ['link' => 'courses', 'name' => 'Cursos', 'description' => 'Pagina de nose', 'icon' => '200', 'group' => 1],
        //     ['link' => 'users.index', 'name' => 'Usuarios', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
        //     ['link' => 'permissions', 'name' => 'Permisos', 'description' => 'Pagina de nose', 'icon' => '300', 'group' => 1],
        //     ['link' => 'activity', 'name' => 'Actividades', 'description' => 'Pagina de nose', 'icon' => 'activity', 'group' => 1],
        // ]);

    }
}
