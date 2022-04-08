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
                                    "Radio Station Bassie & Adriaan", "De Leukste Liedjes van Bassie & Adriaan", "Bassie en Adriaan op Schattenjacht", "Bassie en Adriaan Live!", "60 Liedjes uit Grootmoeders Tijd"];

        $games_array = ["Mario Kart Double Dash", "Legend Of Zelda Windwaker", "Crazy Taxi"];

        $toetsenborden_array = ["IBM Model M", "Razor", "HP", "Corsair"];

        $kinderspeelgoed_array = ["Kleine Lambo", "Lego poppetjes Back To The Future", "Play Mobil Romeins Generaal"];

        foreach ($cassette_array as $cassette) {
            DB::table('items')->insert([
                'item_name' => $cassette,
                'kind' => "cassette",
                'image' => "/img/cassette/" . str_replace(' ', '', $cassette) . ".jpg",
                'description' => "Hierboven ziet u het cassettebandje " . $cassette. ".",
                'time_loaned' => rand(2,10),
                'id_lender' => rand(1,2),
            ]);
        }

        foreach ($games_array as $game) {
            DB::table('items')->insert([
                'item_name' => $game,
                'kind' => "games",
                'image' => "/img/games/" . str_replace(' ', '', $game) . ".jpg",
                'description' => "Hierboven ziet u het videospelletje " . $game. ".",
                'time_loaned' => rand(2,20),
                'id_lender' => rand(1,2),
            ]);
        }

        foreach ($toetsenborden_array as $toetsenbord) {
            DB::table('items')->insert([
                'item_name' => $toetsenbord,
                'kind' => "toetsenborden",
                'image' => "/img/toetsenborden/" . str_replace(' ', '', $toetsenbord) . ".jpg",
                'description' => "Hierboven ziet u het toetsenbord " . $toetsenbord . ".",
                'time_loaned' => rand(2,10),
                'id_lender' => rand(1,2),
            ]);
        }

        foreach ($kinderspeelgoed_array as $kinderspeelgoed) {
            DB::table('items')->insert([
                'item_name' => $kinderspeelgoed,
                'kind' => "kinderspeelgoed",
                'image' => "/img/kinderspeelgoed/" . str_replace(' ', '', $kinderspeelgoed) . ".jpg",
                'description' => "Hierboven ziet u het kinderspeelgoed " . $kinderspeelgoed. ".",
                'time_loaned' => rand(2,10),
                'id_lender' => rand(1,2),
            ]);
        }
    }
}
