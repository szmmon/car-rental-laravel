<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookingConfirmedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(1,10),
            'car_id' => random_int(1,10),
            'location' => fake()->text(10),
            'pick_up_date' => fake()->dateTime(),
            'return_date' => fake()->dateTime(),
            'total_price' => random_int(50,100)
        ];
    }
}
