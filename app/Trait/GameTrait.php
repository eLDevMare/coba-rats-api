<?php

namespace App\Trait;

use App\Services\Games\AdminGameService;
use Illuminate\Support\Facades\DB;

trait GameTrait
{
    protected $gameService;

    public function __construct(AdminGameService $gameService)
    {
        $this->gameService = $gameService;
    }
    public function getGameRoomAdmin($placeId)
    {
        $allGame = DB::table('games')->get();
        $gameRoom = DB::table('place_game')
            ->join('games', 'games.id', '=', 'place_game.game_id')
            ->where('place_game.place_id', '=', $placeId)
            ->select('games.image as game_image',
                'games.game as game_game',
                'place_game.game_id as game_id')
            ->get();

        $formatGameRoom = $this->gameService->gameRoom($gameRoom, $allGame);
        $formatGame = $this->gameService->formatGame($allGame, $formatGameRoom);

        return $formatGame;
    }
}
