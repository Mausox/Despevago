<?php

namespace App\Http\Controllers;

use App\UnavailableRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Reservation;
use App\Room;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reservation::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Return Reservation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Reservation::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Reservation::find($id)->update($request->all());
        return "The reservation ID: {$id} was updated!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::destroy($id);
        return "The reservation {$id} was removed!";
    }

    public function userReservations($user_id)
    {
        $reservations = Reservation::where('user_id',$user_id)->where('closed',true)->get();
        foreach ($reservations as $reservation)
        {
            $unavailable_rooms = $reservation->unavailable_rooms()->get();
            return $unavailable_rooms;
        }

        return $reservations;
    }


    //Función que permite reservar una habitación
    //Entradas POST: room_id, adults_number, children_number, user_id, date (arreglo con fechas en las que será solicitada la habitación)

    public function roomReservation(Request $request)
    {
        $room_id = $request->room_id;
        $adults_number = $request->adults_number;
        $children_number = $request->children_number;
        $user_id = $request->user_id;
        $dates = $request->date;

        $room = Room::find($room_id);

        $adult_price = floatval(preg_replace('/[^\d\.]/', '', $room->adult_price));
        $child_price = floatval(preg_replace('/[^\d\.]/', '', $room->child_price));

        if($adults_number+$children_number <= $room->capacity)
        {
            $reservation = Reservation::where('user_id',$user_id)->where('closed',false)->first();

            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $current_balance += ($adult_price*$adults_number + $child_price*$children_number);
            $reservation->current_balance = money_format('%i',$current_balance);

            foreach ($dates as $date)
            {
                UnavailableRoom::create(['date'=>$date,'closed' => false, 'reservation_id' => $reservation->id, 'room_id' => $room_id]);
            }

            $reservation->save();


            return "Your room was added to you reservation";
        }

        else
        {
            return "Capacity overflow: Room capacity = " . $room->capacity . " and adults_number + children_number = ".($adults_number + $children_number);
        }
    }


}
