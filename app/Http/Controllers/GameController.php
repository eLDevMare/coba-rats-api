<?php

namespace App\Http\Controllers;

use App\Services\gameService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class GameController extends Controller
{
    protected $gameService;

    public function __construct(GameService $gameService){
        $this->gameService = $gameService;
    }
    public function getAllGame()
    {
        $game = DB::table('games')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'success get all game',
            'data' => $game
        ]);
    }

    public function getGameDetail($gameId)
    {
        $game = DB::table('games')->where('id', $gameId)->first();

        if(!$game) return response()->json(['message' => 'game not found'], 404);

        return response()->json([
            'status' => 'success',
            'message' => 'success get detail game ' .   $game->game,
            'data' => $game
        ]);
    }

    public function storeGame(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'game' => 'required',
            'genre' => 'required',
            'player' => 'required',
        ]);

        if($validate->fails()) return response()->json($validate->errors(), 404);

        $game = $this->gameService->storeGame($request);

        return response()->json([
           'status' => 'success',
           'message' => 'success store game',
           'data' => $game
        ]);
    }

    public function updateGame($gameId, Request $request)
    {
        $validate = Validator::make($request->all(), [
            'images' => 'images|mimes:peg,png,jpg,svg|max:2048|nullable',
        ]);

        if($validate->fails()) return response()->json($validate->errors(), 404);

        $game = $this->gameService->updateGame($request, $gameId);

        return response()->json([
            'status' => 'success',
            'message' => 'success update game',
        ]);
    }

    public function deleteGame($gameId){
        $game = DB::table('games')->where('id', $gameId)->first();

        DB::table('games')->where('id', $gameId)->delete();
        File::delete(public_path('image/games/' . $game->image));

        if(!$game) return response()->json(['error' => 'game not found'], 404);

        return response()->json([
           'status' => 'success',
           'message' => 'success delete game'
        ]);
    }

    public function getGameRoom($placeId)
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

        return response()->json([
           'status' => 'success',
           'message' => 'success get game roo',
            'data' => $formatGame
        ]);
    }

    public function updateGameRoom(Request $request, $placeId)
    {
        foreach ($request->gameIds as $gameId)
        {
            $placeGameIn = DB::table('place_game')
                ->where('place_id',$placeId )
                ->where('game_id', $gameId);

            $existGame = $placeGameIn->exists();

            if($existGame) $placeGameIn->delete();
            if(!$existGame) {
                DB::table('place_game')->insert([
                    'place_id' => $placeId,
                    'game_id' => $gameId,
                ]);
            }
        }

        return response()->json([
           'status' => 'success',
           'message' => 'success update game room',
        ]);
    }
}
