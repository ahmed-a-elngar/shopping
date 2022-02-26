<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pics = ['images (12).jpeg', 'images (14).jpeg', 'images (16).jpeg'];
        $price = rand(5, 50);
        $owners = User::where('role', 'seller')->get('id');
        return [
            //
            'name' => $this->faker->text(20),
            'picture' => $pics[rand(0, 2)],
            'description' => $this->faker->text(100),
            'price' => $price,
            'total_price' => $this->faker->numberBetween(5, $price),
            'stock' => $this->faker->unique()->numberBetween(1, 50),
            'owner' => $owners[rand(0, count($owners)-1)],
            'category' => Category::where('id', rand(1, 2))->first()->id,
            'brand' => Brand::where('id', rand(1, 2))->first()->id,
        ];
    }
}
