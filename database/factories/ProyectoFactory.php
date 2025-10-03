<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'codigo' => 'PRO-' . strtoupper($this->faker->unique()->bothify('??##')),
        'nombre' => $this->faker->sentence(3),
        'descripcion' => $this->faker->paragraph,
        'sector' => $this->faker->randomElement(['Salud', 'Educación', 'Infraestructura', 'Ambiente']),
        'fecha_inicio' => $this->faker->dateTimeBetween('-1 year', 'now'),
        'fecha_fin' => $this->faker->dateTimeBetween('now', '+1 year'),
        'presupuesto' => $this->faker->numberBetween(10000, 1000000),
        'estado' => $this->faker->randomElement(['borrador', 'aprobado', 'ejecucion', 'completado']),
        'user_id' => User::inRandomOrder()->first()->id,
    ];
}

}