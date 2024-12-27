<?php

namespace App\Http\Controllers;

use App\Services\Dashboard\AdminDashboardService;
use App\Trait\GameTrait;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    use GameTrait {
        GameTrait::getGameRoomAdmin as gameGetGameRoomAdmin;
    }
    public function getGameDashbaord($placeId)
    {
        $game = $this->getGameRoomAdmin($placeId);

        $filter = $game->filter(function ($item) {
           return $item['isSelect'] == true;
        });

        $format = $filter->map(function ($item) {
           return [
               'id' => $item['id'],
               'game' => $item['game'],
               'image' => $item['image'],
           ];
        });

        return response()->json([
            'status' => true,
            'data' => $format
        ]);
    }

    public function getDashboardData()
    {

    }


}
