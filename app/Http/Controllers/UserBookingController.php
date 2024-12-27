<?php

namespace App\Http\Controllers;

use App\Services\Booking\UserBokingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserBookingController extends Controller
{
    protected $bookingService;

    public function __construct(UserBokingService $bookingService){
        $this->bookingService = $bookingService;
    }

    public function booking(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string',
            'phone' => 'required',
        ], [
            'name.string' => 'The name field must be a string',
            'phone.required' => 'The phone number required',
        ]);

        if ($validate->fails()) return response()->json($validate->errors(), 422);

        $boking = $this->bookingService->bokingUser($request);
        $this->bookingService->addSession($request, $boking);

        return response()->json([
           'status' => 'success',
           'message' => 'success request booking',
        ]);
    }
}
