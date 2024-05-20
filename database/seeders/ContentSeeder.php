<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content\CON_CourseSection;
use App\Models\Content\CON_Task;
use App\Models\Content\CON_TaskFile;
use App\Models\Reports\RPT_TaskDeliveries;
use App\Models\Content\CON_TaskDeliveryFile;
use App\Models\Content\CON_Form;
use App\Models\Content\CON_FormFieldType;
use App\Models\Content\CON_FormField;
use App\Models\Content\CON_FormResponse;
use App\Models\Content\CON_ActivityType;
use App\Models\Content\CON_ActivityLink;
use App\Models\Content\CON_Activity;
use App\Models\Content\CON_ActivityEvidenceType;
use App\Models\Content\CON_ActivityEvidence;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CON_CourseSection::factory()->count(1000)->create();
        CON_Task::factory()->count(10000)->create();
        CON_TaskFile::factory()->count(12000)->create();
        RPT_TaskDeliveries::factory()->count(300000)->create();
        CON_TaskDeliveryFile::factory()->count(400000)->create();
        CON_Form::factory()->count(4000)->create();

        CON_FormFieldType::insert([
            ['name' => 'text', 'color' => '#456'],
            ['name' => 'option', 'color' => '#456'],
            ['name' => 'checked', 'color' => '#456'],
            ['name' => 'file', 'color' => '#456'],
        ]);

        CON_FormField::factory()->count(50000)->create();
        CON_FormResponse::factory()->count(50000)->create();

        CON_ActivityType::insert([
            ['name' => 'Deportiva', 'description' => 'Actividad de deporte presencial'],
            ['name' => 'Meet', 'description' => 'Reunion virtual para clase'],
            ['name' => 'Taller', 'description' => 'Sesión práctica y participativa sobre un tema específico'],
            ['name' => 'Conferencia', 'description' => 'Charla o exposición sobre un tema en particular'],
            ['name' => 'Seminario', 'description' => 'Encuentro educativo centrado en un tema específico con participación activa'],
            ['name' => 'Webinar', 'description' => 'Seminario o presentación online'],
            ['name' => 'Grupo de estudio', 'description' => 'Reunión de estudiantes para repasar y estudiar temas juntos'],
            ['name' => 'Tutoria', 'description' => 'Sesión de apoyo educativo individual o en grupo pequeño'],
        ]);

        CON_Activity::factory()->count(3000)->create();
        CON_ActivityLink::factory()->count(5000)->create();

        CON_ActivityEvidenceType::insert([
            ['name' => 'video', 'description' => 'Video de la actividad'],
            ['name' => 'imagen', 'description' => 'Video de la actividad'],
            ['name' => 'transmision', 'description' => 'Transmision en vivo de la actividad virtual']
        ]);
        CON_ActivityEvidence::factory()->count(5000)->create();
    }
}
