<?php

namespace Database\Factories;

use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'          =>  fake()->randomElement(Order::pluck('id')),
            'menu_item_id'      =>  fake()->randomElement(MenuItem::pluck('id')),
            'quantity'          =>  fake()->numberBetween(10,100),
            'subtotal'          =>  fake()->numberBetween(100,1000)
        ];
    }
}

