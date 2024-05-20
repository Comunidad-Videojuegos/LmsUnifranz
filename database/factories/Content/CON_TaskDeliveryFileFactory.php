<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CON_TaskDeliveryFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['img', 'png', 'xlsx', 'pdf', 'docx'];
        return [
            'deliveryId' => fake()->numberBetween(1, 300000),
            'size' => fake()->numberBetween(1000, 300000),
            'type' => fake()->randomElement($types),
            'link' => fake()->url(),
        ];
    }
}
