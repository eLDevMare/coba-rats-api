<?php

namespace App\Services\Booking;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserBokingService
{
    public function bokingUser($request)
    {
        $date = Carbon::parse($request['date'])->format('Y-m-d');

        $boking = DB::table('bookings')->insertGetId([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'date' => $date,
            'duration' => $request['duration'],
            'console' => $request['console'],
            'place' => $request['place'],
            'total' => $request['total'],
            'type' => $request['type'],
            'status' => "pending",
            'role' => "users",
            'place_id' => $request['place_id'],
        ]);

        return $boking;
    }

    public function addSession($request, $boking)
    {
        foreach ($request->sessions as $session){
            $sessionss = Str::replace('.', ':', $session);
            DB::table('booking_detail')->insert([
                'booking_id' => $boking,
                'session' => $sessionss,
            ]);
        }
    }
}
