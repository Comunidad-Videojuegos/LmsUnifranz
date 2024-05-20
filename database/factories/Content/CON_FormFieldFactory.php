<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content\CON_FormField>
 */
class CON_FormFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'typeId' => fake()->numberBetween(1, 4),
            'formId' => fake()->numberBetween(1, 4000),
            'question' => fake()->text(100),
            'orderNumber' => fake()->numberBetween(1, 20)
        ];
    }
}
