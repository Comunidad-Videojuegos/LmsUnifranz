<?php

namespace Database\Factories\Learning;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class APR_CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'studentId' => fake()->numberBetween(1, 150),
            'name' => fake()->text(20),
            'description' => fake()->text(50),
            'link' => fake()->url()
        ];
    }
}
