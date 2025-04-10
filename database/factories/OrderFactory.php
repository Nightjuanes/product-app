<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        
            'user_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'address'=> $this->faker->address,
            'total' => $this->faker->numberBetween(1, 10),


        ];
    }
}
