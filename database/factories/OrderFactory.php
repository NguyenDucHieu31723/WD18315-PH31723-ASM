<?php

namespace Database\Factories;

use App\Models\User;
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
        $status = ['pending', 'completed', 'canceled', 'shipped'];
        return [
            'user_id' => User::all()->random()->user_id,
            'total_amount' => $this->faker->randomFloat(2, 20, 50),
            'status' => $this->faker->randomElement($status),
            'order_date' => $this->faker->dateTime(),
            'delivery_date' => $this->faker->dateTime(),
        ];
    }
}
