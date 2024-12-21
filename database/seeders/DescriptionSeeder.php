<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $description = [
            'Semua Room 1 hingga Room 5 kami dilengkapi dengan AC untuk kenyamanan maksimal dan sofa yang empuk, menciptakan suasana bermain yang santai dan menyenangkan. Ideal untuk sesi permainan pribadi atau bersama teman.',
            'Room VIP menawarkan pengalaman bermain yang lebih istimewa dengan kapasitas ruangan yang lebih luas, sofa premium yang lebih besar dan nyaman, serta area eksklusif yang memberikan privasi maksimal untuk Anda dan teman-teman. Pilihan sempurna untuk sesi gaming tanpa gangguan!'
        ];


        foreach ($description as $desc) {
            DB::table('descriptions')->insert([
                'description' => $desc
            ]);
        }
    }
}
