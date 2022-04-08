<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class KindOfItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $kind_of_item_array = ["kinderspeelgoed", "games", "cassette", "toetsenborden"];

        foreach ($kind_of_item_array as $kind_of_item) {
            DB::table('kind_of_item')->insert([
                'kind' => $kind_of_item
            ]);
        }
    }
}
