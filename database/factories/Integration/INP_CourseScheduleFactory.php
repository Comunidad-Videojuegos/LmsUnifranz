<?php

namespace Database\Factories\Integration;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class INP_CourseScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generar una hora de inicio entre las 7 AM y las 8 PM (20 horas)
        $timeStart = fake()->time($format = 'H:i:s', $max = '20:00:00');

        // Convertir timeStart a un timestamp para sumarle 1 o 2 horas
        $timeStartTimestamp = strtotime($timeStart);

        // Generar una duración aleatoria de 1 o 2 horas
        $duration = fake()->numberBetween(1, 2) * 3600; // 1 o 2 horas en segundos

        // Calcular el tiempo de finalización asegurando que no pase las 10 PM
        $timeEndTimestamp = min($timeStartTimestamp + $duration, strtotime('22:00:00'));
        $timeEnd = date('H:i:s', $timeEndTimestamp);

        return [
            'courseId' => fake()->numberBetween(1, 200),
            'schoolDay' => now()->format('Y-m-d'),
            'timeStart' => $timeStart,
            'timeEnd' => $timeEnd,
        ];
    }
}
