<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CON_ActivityLinkFactory extends Factory
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
            'link' => fake()->url(),
            'meeting' => fake()->boolean(70),
            'material' => fake()->boolean(70),
            'test' => fake()->boolean(70),
        ];
    }
}
