<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'nama' => fake()->name(),
            'nis' => Str::random(6),
            'email' => fake()->unique()->safeEmail(),
            'tingkat_id' => $this->faker->randomElement([7, 8, 9]),
            'strata_id' => 3,
        
        ];
    }
}
