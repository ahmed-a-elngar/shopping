<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class order_itemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'product' => rand(1, 50),
            'quantity' => rand(1, 2),
            'order' => rand(1, 10),
        ];
    }
}
