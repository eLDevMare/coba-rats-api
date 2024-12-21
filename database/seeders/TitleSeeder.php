<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            '11',
            '12',
            '13',
            '14',
            '15',
            'Vip 1',
            'Vip 2',
        ];

        foreach ($places as $place) {
            DB::table('titles')->insert([
                'title' => $place,
            ]);
        }

    }
}
