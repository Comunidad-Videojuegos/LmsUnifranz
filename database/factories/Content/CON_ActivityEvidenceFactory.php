<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content\CON_ActivityEvidence>
 */
class CON_ActivityEvidenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activityId' => fake()->numberBetween(1, 3000),
            'typeId' => fake()->numberBetween(1, 3),
            'link' => fake()->url()
        ];
    }
}
