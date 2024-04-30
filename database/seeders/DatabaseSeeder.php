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

        \App\Models\Users\USR_AppSection::factory()->createMany([
            ['name' => 'Configuraciones', 'link' => 'config' , 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Cursos', 'link' => 'courses', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Usuarios', 'link' => 'users', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Permisos', 'link' => 'permissions', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Actividades', 'link' => 'activity', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Plataforma', 'link' => 'config', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Desempeño academico', 'link' => 'config', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Transmisiones', 'link' => 'config', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Reuniones', 'link' => 'config', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Horarios', 'link' => 'config', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Docentes', 'link' => 'config', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1],
            ['name' => 'Estudantes', 'link' => 'config', 'description' => 'Pagina de nose', 'icon' => 'people fill', 'group' => 1]
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
