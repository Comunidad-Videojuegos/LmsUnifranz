<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Colaboration\COL_NotificationType;
use App\Models\Colaboration\COL_Notification;
use App\Models\Colaboration\COL_Forum;
use App\Models\Colaboration\COL_ForumFile;
use App\Models\Colaboration\COL_ForumConversation;
use App\Models\Colaboration\COL_ForumConversationFile;

class ColaborationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        COL_NotificationType::insert([
            ['name' => 'Mensaje', 'color' => '#456'],
            ['name' => 'Error', 'color' => '#456'],
            ['name' => 'Advertencia', 'color' => '#456'],
            ['name' => 'Publicidad', 'color' => '#456'],
            ['name' => 'Acceso', 'color' => '#456'],
        ]);

        COL_Notification::factory()->count(1000)->create();
        COL_Forum::factory()->count(3000)->create();
        COL_ForumFile::factory()->count(3100)->create();
        COL_ForumConversation::factory()->count(4000)->create();
        COL_ForumConversationFile::factory()->count(4300)->create();
    }
}
