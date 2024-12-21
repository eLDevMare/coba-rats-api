<?php

namespace App\Http\Controllers;

use App\Services\PlaceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
    protected $placeService;

    public function __construct(PlaceService $placeService){
        $this->placeService = $placeService;
    }

    public function getData($bokingId, $date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');

        $game = $this->placeService->getGame($bokingId);
        $session = $this->placeService->getSession($bokingId);
        $boking = $this->placeService->getBoking($bokingId, $date);

        $formatData = $this->placeService->formatData($game, $session, $boking, $bokingId, $date);

        return response()->json([
            'status' => 'success',
            'message' => 'success get daa',
            'data' => $formatData
        ]);
    }

    public function getPlaceDetail($placeId)
    {
        $detail = DB::table('places')->where('id', $placeId)->first();

        if(!$detail) return response()->json(['message' => 'place not found'], 404);

        return response()->json([
           'status' => 'success',
           'message' => 'success detail place',
           'data' => $detail
        ]);
    }

    public function updatePlace(Request $request, $placeId)
    {
        DB::table('places')->where('id', $placeId)->update([
            'console' => $request->console,
            'capacity' => $request->capacity,
            'type' => $request->type
        ]);

        return response()->json([
           'status' => 'success',
           'message' => 'success update place',
        ]);
    }


}
