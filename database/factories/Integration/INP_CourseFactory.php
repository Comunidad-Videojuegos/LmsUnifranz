<?php

namespace Database\Factories\Integration;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Integration\INP_Course>
 */
class INP_CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gestions = [2022, 2023, 2024];
        return [
            'instructorId' => fake()->numberBetween(1, 50),
            'calificationTotal' => fake()->randomFloat(2, 50, 100),
            'referenceId' => fake()->numberBetween(1, 200),
            'name' => fake()->words(3, true),
            'gestion' => fake()->randomElement($gestions),
            'mandatory' => fake()->boolean(90),
            'initials' => fake()->lexify('????'),
            'description' => fake()->sentence(),
            'groupLink' => fake()->url()
        ];
    }
}
