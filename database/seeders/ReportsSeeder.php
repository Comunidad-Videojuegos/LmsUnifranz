<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reports\RPT_ActivityAssistance;
use App\Models\Reports\RPT_Login;
use App\Models\Reports\RPT_PlatformActivityType;
use App\Models\Reports\RPT_PlatformActivity;
use App\Models\Reports\RPT_PlanMaterialProgress;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RPT_ActivityAssistance::factory()->count(4000)->create();
        RPT_Login::factory()->count(1000)->create();

        RPT_PlatformActivityType::insert([
            ['name' => 'Inicio de Sesión', 'description' => 'El usuario ha iniciado sesión en la plataforma'],
            ['name' => 'Finalización de Curso', 'description' => 'El usuario ha completado un curso'],
            ['name' => 'Subida de Archivo', 'description' => 'El usuario ha subido un archivo a la plataforma'],
            ['name' => 'Descarga de Archivo', 'description' => 'El usuario ha descargado un archivo desde la plataforma'],
            ['name' => 'Participación en Foro', 'description' => 'El usuario ha participado en un foro de discusión'],
            ['name' => 'Realización de Examen', 'description' => 'El usuario ha completado un examen en la plataforma'],
            ['name' => 'Actualización de Perfil', 'description' => 'El usuario ha actualizado su perfil en la plataforma'],
        ]);

        RPT_PlatformActivity::factory()->count(700)->create();
        RPT_PlanMaterialProgress::factory()->count(4000)->create();
    }
}
