<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $gameIds = DB::table('sessionss')->pluck('id');
        $descriptionIds = DB::table('places')->pluck('id');

        foreach ($descriptionIds as $descriptionId) {
            foreach ($gameIds as $gameId) {
                DB::table('place_time')->insert([
                    'place_id' => $descriptionId,
                    'session_id' => $gameId,
                ]);
            }
        }
    }
}
