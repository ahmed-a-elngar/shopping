<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class orderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::where('role', 'customer')->get('id');
        return [
            //
            'user' => $users[rand(0, count($users)-1)],
            'status' => rand(0, 1),
        ];
    }
}
