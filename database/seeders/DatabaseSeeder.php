<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DescriptionSeeder::class,
            GameSeeder::class,
            TitleSeeder::class,
            SessionSeeder::class,
            PlaceSeeder::class,
            PlaceGameSeeder::class,
            PlaceTimeSeeder::class,
        ]);

    }
}
