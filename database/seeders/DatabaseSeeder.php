<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(userSeeder::class);
        $this->call(brandSeeder::class);
        $this->call(targetSeeder::class);
        $this->call(categorySeeder::class);
        $this->call(colorSeeder::class);
        $this->call(sizeSeeder::class);
        $this->call(stockSeeder::class);
        $this->call(productSeeder::class);
        $this->call(orderSeeder::class);
        $this->call(order_itemSeeder::class);

    }
}
