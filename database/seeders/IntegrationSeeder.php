<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Integration\INP_Career;
use App\Models\Integration\INP_Student;
use App\Models\Integration\INP_Instructor;
use App\Models\Integration\INP_Course;
use App\Models\Integration\INP_CourseInscribed;
use App\Models\Integration\INP_CourseSchedule;

class IntegrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        INP_Career::insert([
            ['name' => 'Ingeniería en sistemas', 'referenceId' => 1, 'initials' => 'SIS', 'description' => 'Carrera de Unifranz', 'duration' => 4.5],
            ['name' => 'Ingeniería Civil', 'referenceId' => 2, 'initials' => 'CIV', 'description' => 'Carrera de Unifranz', 'duration' => 5.0],
            ['name' => 'Administración de Empresas', 'referenceId' => 3, 'initials' => 'ADM', 'description' => 'Carrera de Unifranz', 'duration' => 4.0],
            ['name' => 'Derecho', 'referenceId' => 4, 'initials' => 'DER', 'description' => 'Carrera de Unifranz', 'duration' => 5.0],
            ['name' => 'Medicina', 'referenceId' => 5, 'initials' => 'MED', 'description' => 'Carrera de Unifranz', 'duration' => 6.0],
            ['name' => 'Psicología', 'referenceId' => 6, 'initials' => 'PSI', 'description' => 'Carrera de Unifranz', 'duration' => 5.0],
            ['name' => 'Comunicación Social', 'referenceId' => 7, 'initials' => 'COM', 'description' => 'Carrera de Unifranz', 'duration' => 4.0],
            ['name' => 'Diseño Gráfico', 'referenceId' => 8, 'initials' => 'DGR', 'description' => 'Carrera de Unifranz', 'duration' => 4.0],
            ['name' => 'Ingeniería Ambiental', 'referenceId' => 9, 'initials' => 'AMB', 'description' => 'Carrera de Unifranz', 'duration' => 5.0],
            ['name' => 'Arquitectura', 'referenceId' => 10, 'initials' => 'ARQ', 'description' => 'Carrera de Unifranz', 'duration' => 5.0],
            ['name' => 'Marketing', 'referenceId' => 11, 'initials' => 'MKT', 'description' => 'Carrera de Unifranz', 'duration' => 4.0],
            ['name' => 'Contaduría Pública', 'referenceId' => 12, 'initials' => 'CON', 'description' => 'Carrera de Unifranz', 'duration' => 4.0]
        ]);

        INP_Student::factory()->count(900)->create();
        INP_Instructor::factory()->count(100)->create();
        INP_Course::factory()->count(200)->create();
        INP_CourseInscribed::factory()->count(10000)->create();
        INP_CourseSchedule::factory()->count(400)->create();
    }
}
