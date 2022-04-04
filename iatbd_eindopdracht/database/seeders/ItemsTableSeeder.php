<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cassette_array = ["Avonturen met Bassie en Adriaan", "Bassie en Adriaan", "Bassie en Adriaan Als Geheime Agenten",
                                    "Feest Met Bassie & Adriaan", "Sprookjes verteld door Bassie & Adriaan", "De Leukste Liedjes van Bassie & Adriaan", "Circus Bassie & Adriaan",
                                    "Radio Station Bassie & Adriaan", "Bassie en Adriaan En De Reis Vol Verrassingen", "De Leukste Liedjes van Bassie & Adriaan", "Bassie en Adriaan op Schattenjacht", "Bassie en Adriaan Live!", "60 Liedjes uit Grootmoeders Tijd"];

        foreach ($cassette_array as $cassette) {
            DB::table('items')->insert([
                'item_name' => $cassette,
                'kind' => "cassette",
                'image' => "/img/cassette/" . str_replace(' ', '', $cassette) . ".jpg",
                'description' => "Hierboven ziet u het product " . $cassette,
                'time_loaned' => rand(2,10),
                'id_lender' => 1,
            ]);
        }
    }
}
