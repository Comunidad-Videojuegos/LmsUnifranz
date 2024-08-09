<?php

namespace Database\Factories\Integration;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class INP_InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['docente', 'auxiliar', 'invitado', 'maestria', 'doctorado'];
        $specialities = ['Programacion', 'Administracion', 'Electronica', 'Finanzas', 'Medicina', 'Fisica', 'Matematica', 'Quimica', 'Videojuegos'];


        return [
            'id' => fake()->unique()->numberBetween(901, 1000),
            'speciality' => fake()->randomElement($specialities),
            'type' => fake()->randomElement($types),
        ];
    }
}
