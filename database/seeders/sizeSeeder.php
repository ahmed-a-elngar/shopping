<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class sizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Size::create(['name'=> '39', 'group'=> '1']);
        Size::create(['name'=> '40', 'group'=> '1']);
        Size::create(['name'=> '41', 'group'=> '1']);
        Size::create(['name'=> '42', 'group'=> '1']);
        Size::create(['name'=> '43', 'group'=> '1']);
        Size::create(['name'=> '44', 'group'=> '1']);
    }
}
