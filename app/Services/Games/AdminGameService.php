<?php

namespace App\Services\Games;

use Illuminate\Support\Facades\DB;

class AdminGameService
{
    public function storeGame($request){

        $imageFile = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image/games'), $imageFile);

        $games = DB::table('games')->insert([
            'image' => $imageFile,
            'game' => $request->game,
            'genre' => $request->genre,
            'player' => $request->player
        ]);

        return $games;
    }

    public function gameRoom($gameRoom)
    {
        $formatGameRoom = $gameRoom->map(function ($item) {
            return [
                'id' => $item->game_id,
            ];
        });

        return $formatGameRoom;
    }

    public function formatGame($allGame,$formatGameRoom)
    {
        $formatGame = $allGame->map(function ($item) use($formatGameRoom) {
            $isSelect = $formatGameRoom->contains(function ($itemm) use($item) {
                return $itemm['id'] == $item->id;
            });
            return [
                'id' => $item->id,
                'isSelect' => $isSelect,
                'image' => $item->image,
                'game' => $item->game,
            ];
        });

        return $formatGame;
    }

    public function updateGame($request,$gameId)
    {
        $exists = $request->hasFile('image');

        if ($exists) {
            $imageFile = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/games'), $imageFile);
        }

        if(!$exists) $imageFile = DB::table('games')->where('id', $gameId)->value('image');

        DB::table('games')->where('id',$gameId)->update([
            'image' => $imageFile,
            'game' => $request->game,
            'genre' => $request->genre,
            'player' => $request->player
        ]);

    }
}
