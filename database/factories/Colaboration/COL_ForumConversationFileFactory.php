<?php

namespace Database\Factories\Colaboration;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colaboration\COL_ForumConversationFile>
 */
class COL_ForumConversationFileFactory extends Factory
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
            'conversationId' => fake()->numberBetween(1, 4000),
            'link' => fake()->url(),
            'size' => fake()->numberBetween(1000, 100000),
            'type' => fake()->randomElement($types)
        ];
    }
}
