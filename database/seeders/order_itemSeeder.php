<?php

namespace Database\Seeders;

use App\Models\Order_Item;
use Illuminate\Database\Seeder;

class order_itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Order_Item::factory(50)->create();
    }
}
