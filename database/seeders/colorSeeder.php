<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class colorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Color::create(['name'=>'Red', 'value'=>'e14']);
        Color::create(['name'=>'White', 'value'=>'f8f8f8']);
        Color::create(['name'=>'Green', 'value'=>'2dee11']);
        Color::create(['name'=>'Blue', 'value'=>'1164ee']);
        Color::create(['name'=>'Yellow', 'value'=>'e5ee11']);
        Color::create(['name'=>'Black', 'value'=>'18181b']);
        Color::create(['name'=>'Brown', 'value'=>'ee5411']);
    }
}
