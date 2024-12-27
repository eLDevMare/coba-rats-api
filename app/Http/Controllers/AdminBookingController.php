<?php

namespace App\Http\Controllers;

use App\Services\Booking\AdminBokingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookingController extends Controller
{
    protected $adminBookingService;

    public function __construct(AdminBokingService $adminBookingService)
    {
        $this->adminBookingService = $adminBookingService;
    }
    public function  confirmBokingAuto(Request $request)
    {
         DB::table('bookings')->updateOrInsert(
            ['id' => $request->id],
            ['status' => 'accepted']
        );

        return response()->json([
            'status' => 'success',
            'message' => 'success confirm request',
        ]);
    }
    public function declinedBokingAuto(Request $request)
    {
        DB::table('bookings')->updateOrInsert(
            ['id' => $request->id],
            ['status' => 'declined']
        );

        return response()->json([
            'status' => 'success',
            'message' => 'success declined request',
        ]);
    }

    public function confirmBoking(Request $request, $date)
    {
        $data = $request->all();

         foreach ($data as $request) {
             $requestSession = $request['sessions'];
             $boking = $this->adminBookingService->confirmBoking($request, $date);
             $this->adminBookingService->addSession($requestSession, $boking);
         }

        return response()->json([
            'status' => 'success',
            'message' => 'success confirm data',
        ]);
    }

    public function unconfirmBoking(Request $request, $date)
    {
        $data = $request->all();
        foreach ($data as $request) {
            $requestSession = $request['sessions'];
            $requestPlaceId = $request['placeId'];
            $this->adminBookingService->unconfirmBoking($requestSession, $requestPlaceId, $date);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'success delete data',
        ]);
    }
}
