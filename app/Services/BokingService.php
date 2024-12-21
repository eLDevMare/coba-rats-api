<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BokingService
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

    public function confirmBoking($placeId ,$date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');

        $boking = DB::table('bookings')->insertGetId([
            'name' => "admin",
            'date' => $date,
            'status' => 'accepted',
            'role' => "admin",
            'place_id' => $placeId,
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

    public function unconfirmBoking($request, $placeId, $date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');
        $boking = DB::table('booking_detail')
            ->join('bookings', 'booking_detail.booking_id', '=', 'bookings.id')
            ->select('booking_detail.*')
            ->where('bookings.date', $date)
            ->where('bookings.place_id', $placeId)
            ->whereIn('booking_detail.session', $request->sessions)
            ->get();

        foreach ($boking as $bokingg) {
            DB::table('booking_detail')->where('id', $bokingg->id)->delete();
        }

    }
}
