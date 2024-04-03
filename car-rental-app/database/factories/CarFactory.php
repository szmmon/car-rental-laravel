<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => random_int(10,100),
            'name' => fake()->name(),
            'description' =>fake()->name(20),
            'year' =>random_int(1900, 2010),
            'daily_price' =>random_int(10,100),
            'updated_at' => '2024-04-02 15:33:52',
            'created_at' => '2024-04-02 15:33:52'
        ];
    }
}
