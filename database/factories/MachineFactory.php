<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'serial'=>'MCH'.
        $this->faker->unique()->numberBetween(1000,9999),
        'type'=> $this->faker->randomElement(['Excavadora','Motoniveladora','Cargadora','Rodillo compactador','Asphaltadora','Retroescavadora','Minicargador','Tractor']), 
        'brand_model'=> $this->faker->randomElement(['Pauny','Caterpillar','Jhon Deere','Case','NeWHolland','Volvo']).''.$this->faker->bothify('###X'),
        ];
    }
}
