<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Size;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class stockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $colors = Color::all('id');
        $sizes = Size::all('id');

        return [
            //
            'color' => $colors[rand(0, 6)],
            'size' => $sizes[rand(0, 5)],
            'quantity' => rand(2, 5),
        ];
    }
}
