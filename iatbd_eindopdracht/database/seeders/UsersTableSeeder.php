<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Guido van Duijvenvoorde",
            'email' => "guidoduif2002@gmail.com",
            'password' => bcrypt('banaan'),
            'role' => "admin",
        ]);

        DB::table('users')->insert([
            'name' => "Arie Bombarie",
            'email' => "ariebombarie@gmail.com",
            'password' => bcrypt('chinees'),
        ]);
    }
}
