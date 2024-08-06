<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' =>User::all()->random()->user_id,
            'product_id' =>Product::all()->random()->product_id,
            'quantity'=>$this->faker->randomNumber(),
            'price'=>$this->faker->randomFloat(2,100,300)
        ];
    }
}
