<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomNumber(1,2),
            'price_total' => $this->faker->randomNumber(1,5),
            'status' => $this->faker->randomElement(['on cart', 'on process', 'success']),
            'user_id' => mt_rand(1,7),
            'category_id' => mt_rand(1,3),
            'product_id' => mt_rand(1,10),
            'customer_id' => mt_rand(1,7)
        ];
    }
}
