<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $inicio=$this->faker->dateTimeBetween('-6months','now');
        $fin=(clone $inicio)->modify('+'.rand(10,60).'days');
        return [
            'name'=>$this->faker->randomElement([
                'Repavimentación Ruta ',
                'Obra Hidráulica Norte',
                'Construcción Puente ',
                'Pavimentación Ruta ',
                'Autovía',
                'Paso a Nivel',
                'Camino Rural',

            ]),
            'id_province'=>rand(1,24),
            'date_start'=>$inicio,
            'date_end'=>$fin,
        ];
    }
}
