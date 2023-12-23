<?php

namespace Database\Factories;

use App\Models\Customer;
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
            'customer_id'       =>  fake()->randomElement(Customer::pluck('id')),
            'order_number'      =>  fake()->numberBetween(101,190),
            'order_date'        =>  fake()->dateTime(),
            'total_amount'      =>  fake()->numberBetween(100,10000)

        ];
    }
}
