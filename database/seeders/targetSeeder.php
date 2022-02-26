<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Seeder;

class targetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Target::create(['name'=>'men']);
        Target::create(['name'=>'women']);
    }
}
