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
use App\Models\Integration\INP_Gestion;

class IntegrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        INP_Gestion::insert([
            ['year' => 2020, 'part' => 1, 'initDuration' => '2020-02-01', 'endDuration' => '2020-06-15'],
            ['year' => 2020, 'part' => 2, 'initDuration' => '2020-08-01', 'endDuration' => '2020-12-15'],

            ['year' => 2021, 'part' => 1, 'initDuration' => '2021-02-01', 'endDuration' => '2021-06-15'],
            ['year' => 2021, 'part' => 2, 'initDuration' => '2021-08-01', 'endDuration' => '2021-12-15'],

            ['year' => 2022, 'part' => 1, 'initDuration' => '2022-02-01', 'endDuration' => '2022-06-15'],
            ['year' => 2022, 'part' => 2, 'initDuration' => '2022-08-01', 'endDuration' => '2022-12-15'],

            ['year' => 2023, 'part' => 1, 'initDuration' => '2023-02-01', 'endDuration' => '2023-06-15'],
            ['year' => 2023, 'part' => 2, 'initDuration' => '2023-08-01', 'endDuration' => '2023-12-15'],

            ['year' => 2024, 'part' => 1, 'initDuration' => '2024-02-01', 'endDuration' => '2024-06-15']
        ]);

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
