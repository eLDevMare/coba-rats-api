<?php

namespace App\Services\Booking;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminBokingService
{
    public function confirmBoking($request ,$date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');
        $boking = DB::table('bookings')->insertGetId([
            'name' => "admin",
            'date' => $date,
            'status' => 'accepted',
            'role' => "admin",
            'place_id' => $request['placeId'],
        ]);

        return $boking;
    }
    public function unconfirmBoking($requestSession, $requestPlaceId, $date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');
        $requestSessionNew = array_map(function ($session) {
            return Str::replace('.', ':', $session);
        }, $requestSession);


        $sessionFormat = DB::table('booking_detail')
            ->join('bookings', 'booking_detail.booking_id', '=', 'bookings.id')
            ->select('booking_detail.*')
            ->where('bookings.date', $date)
            ->where('bookings.place_id', $requestPlaceId)
            ->get();

        $format = $sessionFormat->map(function ($boking) {
           return[
                "id" => $boking->id,
                "session" => Carbon::parse($boking->session)->format('H:i')
           ];
        })
        ->whereIn("session", $requestSessionNew);

        foreach ($format as $bokingg) {
            DB::table('booking_detail')->where('id', $bokingg["id"])->delete();
        }
    }

    public function addSession($requestSeession, $boking)
    {
        foreach ($requestSeession as $session){
            $sessionss = Str::replace('.', ':', $session);
            DB::table('booking_detail')->insert([
                'booking_id' => $boking,
                'session' => $sessionss,
            ]);
        }
    }


}
