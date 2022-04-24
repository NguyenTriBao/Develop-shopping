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
            ['type_name' => 'Áo'],
            ['type_name' => 'Quần'],
            ['type_name' => 'Ví'],
            ['type_name' => 'Giày'],
            ['type_name' => 'Giỏ xách']
        ]);
        DB::table('manufactures')->insert([
            ['manu_name' => 'Gucci'],
            ['manu_name' => 'Louis Vuitton'],
            ['manu_name' => 'Dior'],
            ['manu_name' => 'Hermès'],
            ['manu_name' => 'Chanel']
        ]);
        DB::table('products')->insert([
            ['name' => 'Wool double-breasted jacket',
            'image' => 'Wooldouble-breastedjacket.img',
            'price' => '94166750',
            'manu_id' => '1',
            'type_id' => '1',
            'quantity' => '1',
            'description' => 'áo limited'],


            ['name' => 'Knit striped cotton jumper',
            'image' => 'Knitstripedcottonjumper.img',
            'price' => '33302875',
            'manu_id' => '1',
            'type_id' => '1',
            'quantity' => '2',
            'description' => 'Áo Knit striped cotton jumper'],


            ['name' => 'BELTED PARKA',
            'image' => 'BELTEDPARKA.img',
            'price' => '98000000',
            'manu_id' => '1',
            'type_id' => '1',
            'quantity' => '2',
            'description' => 'áo BELTED PARKA nổi tiếng'],


            ['name' => 'SLENDER WALLET',
            'image' => 'SLENDERWALLET',
            'price' => '11024400',
            'manu_id' => '2',
            'type_id' => '3',
            'quantity' => '5',
            'description' => 'Ví VL'],


            ['name' => 'TWIST BELT CHAIN WALLET',
            'image' => 'TWISTBELTCHAINWALLET.img',
            'price' => '45016300',
            'manu_id' => '2',
            'type_id' => '3',
            'quantity' => '1',
            'description' => 'Ví limited'],


            ['name' => 'Áo Polo',
            'image' => 'Aopolo.img',
            'price' => '100000',
            'manu_id' => '1',
            'type_id' => '1',
            'quantity' => '2',
            'description' => 'Áo polo rất đẹp'],

        ]);

    }
}
