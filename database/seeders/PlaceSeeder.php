<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $placeIds = DB::table("titles")->pluck("id");
        $placeDescriptions = [
            [
                'title_id' => 1,
                'console' => 'PS 4 Pro',
                'capacity' => 3,
                'description_id' => 1,
                'type' => 'reguler'
            ],
            [
                'title_id' => 2,
                'console' => 'PS 4 Pro',
                'capacity' => 3,
                'description_id' => 1,
                'type' => 'reguler'
            ],
            [
                'title_id' => 3,
                'console' => 'PS 4 Pro',
                'capacity' => 3,
                'description_id' => 1,
                'type' => 'reguler'
            ],
            [
                'title_id' => 4,
                'console' => 'PS 4 Pro',
                'capacity' => 3,
                'description_id' => 1,
                'type' => 'reguler'
            ],
            [
                'title_id' => 5,
                'console' => 'PS 5',
                'capacity' => 3,
                'description_id' => 1,
                'type' => 'reguler'
            ],
            [
                'title_id' => 6,
                'console' => 'PS 5',
                'capacity' => 5,
                'description_id' => 2,
                'type' => 'vip'
            ],
            [
                'title_id' => 7,
                'console' => 'PS 5',
                'capacity' => 5,
                'description_id' => 2,
                'type' => 'vip'
            ],

        ];

        foreach ($placeDescriptions as $placeDescription){
            DB::table('places')->insert([
                'console' => $placeDescription['console'],
                'capacity' => $placeDescription['capacity'],
                'type' => $placeDescription['type'],
                'title_id' => $placeDescription['title_id'],
                'description_id' => $placeDescription['description_id']
            ]);
        }
    }
}
