<?php

namespace App\Http\Controllers;

use App\Services\Places\UserPlaceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPlaceController extends Controller
{
    protected $placeService;

    public function __construct(UserPlaceService $placeService){
        $this->placeService = $placeService;
    }

    public function allPlace()
    {
        $place = DB::table('titles')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'success get data',
            'data' => $place
        ]);
    }

    public function getData($bokingId)
    {

        $game = $this->placeService->getGame($bokingId);

        $formatData = $this->placeService->formatData($game, $bokingId);
        return response()->json([
            'status' => 'success',
            'message' => 'success get daa',
            'data' => $formatData
        ]);
    }


    public function getSession($date, $bokingId)
    {
        $date = Carbon::parse($date)->format('d-m-Y');
        $session = $this->placeService->getSession($bokingId);
        $boking = $this->placeService->getBoking($bokingId, $date);

        $format = $this->placeService->getFormatSession($date, $session, $boking);

        return response()->json([
           'status' => 'success',
           'message' => 'success get daa',
           'data' => [
               'date' => $date,
               'session' => $format,
           ]
        ]);
    }

}
