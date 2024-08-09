<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Learning\APR_Certificate;
use App\Models\Learning\APR_PlanCalification;
use App\Models\Learning\APR_PlanLearning;
use App\Models\Learning\APR_PlanTheme;
use App\Models\Learning\APR_PlanThemeMaterial;

class LearningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        APR_Certificate::factory()->count(70)->create();
        APR_PlanCalification::factory()->count(2000)->create();
        APR_PlanLearning::factory()->count(300)->create();
        APR_PlanTheme::factory()->count(2000)->create();
        APR_PlanThemeMaterial::factory()->count(3000)->create();
    }
}
