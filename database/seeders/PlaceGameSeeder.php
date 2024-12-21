<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gameIds = DB::table('games')->pluck('id');
        $descriptionIds = DB::table('places')->pluck('id');

        foreach ($descriptionIds as $descriptionId) {
            foreach ($gameIds as $gameId) {
                DB::table('place_game')->insert([
                    'place_id' => $descriptionId,
                    'game_id' => $gameId,
                ]);
            }
        }
    }
}
