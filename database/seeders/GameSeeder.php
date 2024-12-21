<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'image' => 'a_way_out.jpg',
                'game' => 'A WAY OUT',
                'genre' => 'Co-op Adventure',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'assassins_valhalla.jpg',
                'game' => 'ASSASSINS VALHALLA',
                'genre' => 'Action RPG',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'astro_playroom.jpg',
                'game' => 'ASTRO PLAYROOM',
                'genre' => 'Platformer',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'call_of_duty.jpg',
                'game' => 'CALL OF DUTY',
                'genre' => 'First-Person Shooter',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'cat_quest_2.jpg',
                'game' => 'CAT QUEST 2',
                'genre' => 'Action RPG',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'crash_team_rumble.webp',
                'game' => 'CRASH TEAM RUMBLE',
                'genre' => 'Racing',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'cult_of_the_lamb.webp',
                'game' => 'CULT OF THE LAMB',
                'genre' => 'Action Roguelike',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'disney_speedstorm.jpg',
                'game' => 'DISNEY SPEEDSTORM',
                'genre' => 'Racing',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'dragon_ball.jpg',
                'game' => 'DRAGON BALL',
                'genre' => 'Fighting',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'efootball.png',
                'game' => 'EFOOTBALL',
                'genre' => 'Sports',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'fc24.webp',
                'game' => 'FC 24',
                'genre' => 'Sports',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'fc25.webp',
                'game' => 'FC 25',
                'genre' => 'Sports',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'genshin_impact.jpg',
                'game' => 'GENSHIN IMPACT',
                'genre' => 'Action RPG',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'giga_bash.jpg',
                'game' => 'GIGA BASH',
                'genre' => 'Fighting',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'ghost_of_tsushima.webp',
                'game' => 'GHOST OF TSUSHIMA',
                'genre' => 'Action-Adventure',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'god_of_war.jpg',
                'game' => 'GOD OF WAR',
                'genre' => 'Action-Adventure',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'gta_v.jpg',
                'game' => 'GTA V',
                'genre' => 'Action-Adventure',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'hello_neighbour.jpg',
                'game' => 'HELLO NEIGHBOUR',
                'genre' => 'Horror',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'hotwheels.webp',
                'game' => 'HOTWHEELS',
                'genre' => 'Racing',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'human_fall_flat.webp',
                'game' => 'HUMAN FALL FLAT',
                'genre' => 'Puzzle Platformer',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'it_takes_two.webp',
                'game' => 'IT TAKES TWO',
                'genre' => 'Co-op Adventure',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'legendary_fishing.jpg',
                'game' => 'LEGENDARY FISHING',
                'genre' => 'Simulation',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'lego_marvel.jpg',
                'game' => 'LEGO MARVEL',
                'genre' => 'Action-Adventure',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'little_nightmare_2.webp',
                'game' => 'LITTLE NIGHTMARE 2',
                'genre' => 'Horror, Puzzle',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'motogp.jpg',
                'game' => 'MOTOGP 24',
                'genre' => 'Racing',
                'player' => 'Multiplayer'
            ],












            [
                'image' => 'mortal_kombat_11.jpg',
                'game' => 'MORTAL KOMBAT 11',
                'genre' => 'Fighting',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'nba_2024.webp',
                'game' => 'NBA 2024',
                'genre' => 'Sports',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'naruto.jpg',
                'game' => 'NARUTO',
                'genre' => 'Fighting',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'nfs_heat.webp',
                'game' => 'NFS HEAT',
                'genre' => 'Racing',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'one_piece.png',
                'game' => 'ONE PIECE',
                'genre' => 'Action-Adventure',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'outlast_2.jpg',
                'game' => 'OUTLAST 2',
                'genre' => 'Horror',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'overcooked.jpg',
                'game' => 'OVERCOOKED',
                'genre' => 'Party',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'overcooked_2.jpg',
                'game' => 'OVERCOOKED 2',
                'genre' => 'Party',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'pubg.jpg',
                'game' => 'PUBG',
                'genre' => 'Battle Royale',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'resident_evil_2.jpg',
                'game' => 'RESIDENT EVIL 2',
                'genre' => 'Horror',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'resident_evil_4.jpg',
                'game' => 'RESIDENT EVIL 4',
                'genre' => 'Horror',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'rune_factory_4.jpg',
                'game' => 'RUNE FACTORY 4',
                'genre' => 'Simulation',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'samurai_warrior_5.jpg',
                'game' => 'SAMURAI WARRIOR 5',
                'genre' => 'Action',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'sims_4.jpg',
                'game' => 'SIMS 4',
                'genre' => 'Simulation',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'spiderman.jpg',
                'game' => 'SPIDERMAN',
                'genre' => 'Action-Adventure',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'spiderman_2.webp',
                'game' => 'SPIDERMAN 2',
                'genre' => 'Action-Adventure',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'tekken_7.jpg',
                'game' => 'TEKKEN 7',
                'genre' => 'Fighting',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'tekken_8.jpg',
                'game' => 'TEKKEN 8',
                'genre' => 'Fighting',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'unravel_two.jpg',
                'game' => 'UNRAVEL TWO',
                'genre' => 'Puzzle Platformer',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'under_the_waves.jpg',
                'game' => 'UNDER THE WAVES',
                'genre' => 'Adventure',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'track_mania.jpg',
                'game' => 'TRACK MANIA',
                'genre' => 'Racing',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'readyset_heroes.jpg',
                'game' => 'READYSET HEROES',
                'genre' => 'Action',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'sackboy_big_adventure.jpg',
                'game' => 'SACKBOY BIG ADVENTURE',
                'genre' => 'Platformer',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'fall_guys.jpg',
                'game' => 'FALL GUYS',
                'genre' => 'Battle Royale',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'harvest_moon.jpg',
                'game' => 'HARVEST MOON',
                'genre' => 'Adventure-RPG',
                'player' => 'Singleplayer'
            ],
            [
                'image' => 'fishing_planet.jpg',
                'game' => 'FISHING PLANET',
                'genre' => 'Sport-Simulation',
                'player' => 'Multiplayer'
            ],
            [
                'image' => 'ride_5.jpg',
                'game' => 'RIDE 5',
                'genre' => 'Racing',
                'player' => 'Singleplayer'
            ],
            ['image' => 'captain_tsubasa.jpg',
                'game' => 'CAPTAIN TSUBASA',
                'genre' => 'Sport',
                'player' => 'Multiplayer'
            ],
        ];

        foreach ($games as $game) {
            DB::table('games')->insert([
                'image' => $game['image'],
                'game' => $game['game'],
                'genre' => $game['genre'],
                'player' => $game['player'],
            ]);
        }
    }
}
