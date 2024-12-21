<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Services\BokingService;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BokingService $bookingService){
        $this->bookingService = $bookingService;
    }

    public function booking(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string',
            'phone' => 'required|integer',
        ], [
            'name.string' => 'The name field must be a string',
            'phone.integer' => 'The phone number field must be a integer',
        ]);

        if ($validate->fails()) return response()->json($validate->errors(), 400);

        $boking = $this->bookingService->bokingUser($request);
        $this->bookingService->addSession($request, $boking);

        return response()->json([
           'status' => 'success',
           'message' => 'success request booking',
        ]);
    }


    public function confirmBokingAuto(Request $request)
    {
        $boking = DB::table('bookings')->updateOrInsert(
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

    public function confirmBoking(Request $request, $placeId, $date)
    {
        $boking = $this->bookingService->confirmBoking($placeId, $date);
        $this->bookingService->addSession($request, $boking);

        return response()->json([
            'status' => 'success',
            'message' => 'success confirm data',
        ]);
    }

    public function unconfirmBoking(Request $request, $placeId, $date)
    {
        $this->bookingService->unconfirmBoking($request, $placeId, $date);

        return response()->json([
            'status' => 'success',
            'message' => 'success delete data',
        ]);
    }
}
