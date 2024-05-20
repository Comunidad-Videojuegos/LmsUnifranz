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
        $this->call([
            UserSeeder::class,
            IntegrationSeeder::class,
            ContentSeeder::class,
            ColaborationSeeder::class,
            LearningSeeder::class,
            ReportsSeeder::class
        ]);
    }
}
