<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('protypes')->insert([
            ['type_name' => 'Áo']
        ]);
        DB::table('manufactures')->insert([
            ['manu_name' => 'Gucci']

        ]);
        DB::table('products')->insert([
            ['name' => 'Áo Polo',
            'image' => 'Aopolo.img',
            'price' => '100000',
            'manu_id' => '1',
            'type_id' => '1',
            'quantity' => '2',
            'description' => 'Áo polo rất đẹp']
        ]);
    }
}
