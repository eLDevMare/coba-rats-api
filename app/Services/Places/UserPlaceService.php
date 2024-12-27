<?php

namespace App\Services\Places;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserPlaceService
{
    public function getGame($bokingId)
    {
        $game =  DB::table('place_game')
            ->join('games', 'place_game.game_id', '=', 'games.id')
            ->join('places', 'place_game.place_id', '=', 'places.id')
            ->select(
                'places.id as places_id',
                'places.console as places_console',
                'places.description_id as places_description',
                'places.type as places_type',
                'games.image as games_image',
                'games.game as games_game',
                'games.genre as games_genre',
                'games.player as games_player',
                'places.capacity as places_capacity'
            )
            ->where('places.id', $bokingId)
            ->get();

        return $game;
    }


    public function formatData($game, $bokingId,)
    {
        $description = DB::table('descriptions')
            ->where('id', $game->first()->places_description)
            ->first()
            ->description;

        $title = DB::table('titles')
            ->where('id', $bokingId)
            ->first()
            ->title;


        $group = $game->groupBy('places_description');

        $format =  $group->map(function ($item) use ($title, $description) {
            return [
                'id' => $item->first()->places_id,
                'console' => $item->first()->places_console,
                'capacity' => $item->first()->places_capacity,
                'type' => $item->first()->places_type,
                'place' => $title,
//                'date' => Carbon::parse($date)->format('d-m-Y'),
                'description' => $description,
                'games' => $item->map(function ($game) {
                    return [
                        'image' => $game->games_image,
                        'game' => $game->games_game,
                        'genre' => $game->games_genre,
                        'player' => $game->games_player,
                    ];
                }),
            ];
        });

        return $format;
    }


    public function getSession($bokingId)
    {
        $session =  DB::table('place_time')
            ->join('places', 'place_time.place_id', '=', 'places.id')
            ->join('sessionss', 'place_time.session_id', '=', 'sessionss.id')
            ->select('sessionss.session as session_session')
            ->where('places.id', $bokingId)
            ->get();

        return $session;
    }

    public function getBoking($bokingId, $date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');

        $boking =  DB::table('booking_detail')
            ->join('bookings', 'booking_detail.booking_id', '=', 'bookings.id')
            ->select(
                'bookings.date as bookings_date',
                'bookings.status as bookings_status',
                'booking_detail.session as bookings_session'
            )
            ->where('bookings.date', $date)
            ->where('bookings.place_id', $bokingId)
            ->get()
            ->map(function ($item) {
                $item->bookings_session = Carbon::parse($item->bookings_session)->format('H:i');
                return $item;
            });

        return $boking;
    }

    public function getFormatSession($date, $session, $boking)
    {
        $date = Carbon::parse($date)->format('Y-m-d');
        $session = $session->map(function ($item) use ($date, $boking) {
            $isBooked = $boking->contains(function ($bokingg) use ($item, $date) {
                return $bokingg->bookings_session == Carbon::parse($item->session_session)->format('H:i') &&
                    $bokingg->bookings_date == $date &&
                    $bokingg->bookings_status == "accepted";
            });

            if($isBooked) return Carbon::parse($item->session_session)->format('H.i');

        })->filter()->values();


        return $session;
    }
}

