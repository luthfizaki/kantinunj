<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->sentence(mt_rand(2,5)),
            'slug' => $this->faker->slug(),
            'desc' => $this->faker->paragraph(),
            'price' => $this->faker->randomNumber(4,5,true),
            'stock' => $this->faker->randomNumber(4,true),
            'user_id' => mt_rand(1,7),
            'category_id' => mt_rand(1,3)
        ];
    }
}
