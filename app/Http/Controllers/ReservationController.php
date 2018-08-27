<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use App\HotelContact;
use App\UnavailableCar;
use App\UnavailableRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Reservation;
use App\Transfer;
use App\Room;
use App\ReservationTransfer;
use App\Car;
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

    //Función que finaliza una reserva y "cierra" las reservas en unavailableRooms, cars,etc.
    //Entradas: reservation_id
    //Tipo: POST
    public function finishReservation(Request $request)
    {
        $reservation = Reservation::find($request->reservation_id);
        $reservation->closed = true;
        $reservation->save();

        //<--------------------------------- Rooms --------------------------------->
        $unavailableRooms = UnavailableRoom::where("reservation_id", $request->reservation_id)->where("closed", false)->get();
        foreach ($unavailableRooms as $unavailableRoom)
        {
            $unavailableRoom->closed = true;
            $unavailableRoom->save();
        }
        //<--------------------------------- Rooms --------------------------------->

        //<------------------------------ Activities ------------------------------->
        $activityReservation = ActivityReservation::where("reservation_id", $request->reservation_id)->where("closed", false)->get();
        $activityReservation->closed = true;
        $activityReservation->capacity -= 1;
        //<------------------------------ Activities ------------------------------->



        $unavailableCars = UnavailableCar::where("reservation_id", $request->reservation_id)->where("closed", false)->get();
        foreach ($unavailableCars as $unavailableCar)
        {
            $unavailableCar->closed = true;
            $unavailableCar->save();
        }


        return "The reservation was successfully done";
    }


    //Función que permite reservar una habitación
    //Entradas: room_id, adults_number, children_number, user_id, date (arreglo con fechas en las que será solicitada la habitación)
    //Tipo: POST
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

    //Función que permite reservar una actividad
    //Entradas: activity_id,user_id
    //Tipo: POST
    //Estado: NO PROBADA POR FALTA DEL MODELO ACTIVITYRESERVATION.
    public function activityReservation(Request $request)
    {
        $activity_id = $request->activity_id;
        $user_id = $request->user_id;

        $activity = Room::find($activity_id);

        $price = floatval(preg_replace('/[^\d\.]/', '', $activity->price));

        if($activity->capacity > 0)
        {
            $reservation = Reservation::where('user_id',$user_id)->where('closed',false)->first();

            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $current_balance += $price;
            $reservation->current_balance = money_format('%i',$current_balance);

            //ActivityReservation::create(['closed' => false, 'reservation_id' => $reservation->id, 'activity' => $activity_id]);

            $reservation->save();


            return "Your activity was added to you reservation";
        }

        else
        {
            return "The event is full";
        }
    }


    //Function: Allows user to make a transfer reservation
    //Parameters: transfer_id, user_id
    //POST
    public function transferReservation(Request $request)
    {
        $transfer_id = $request->transfer_id;
        $user_id = $request->user_id;

        //To obtain the transfer
        $transfer = Transfer::find($transfer_id);

        //To obtain the open reservation of the user
        $reservation = Reservation::where([
            ['user_id', $user_id],
            ['closed', false],
        ])->first();

        //In case the transfer was already reserved by the user
        if($reservation->transfers()->where([['transfer_id',$transfer->id],['reservation_id',$reservation->id]])->exists())
        {
            return "You have already reserved this transfer.";
        }
        else if ($transfer->reservations()->where('transfer_id',$transfer->id)->exists())
        {
            return "This transfer is no longer available.";
        }
        else{

            //Adding the transfer reservation on the pivot table

            $reservation->transfers()->attach($transfer_id,['closed' => false]);

            //Updating balance on the reservation
            $transfer_price = floatval(preg_replace('/[^\d\.]/', '', $transfer->price));
            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $current_balance += $transfer->price;
            $reservation->current_balance = money_format('%i',$current_balance);

            $reservation->save();

            return "Your transfer was added to your reservation";
        }
    }

    public function carReservation(Request $request)
    {
        $car_id = $request->car_id;
        $user_id = $request->user_id;
        $pick_up_date = $request->pick_up_date;
        $return_date = $request->return_date;

        $dates = array($pick_up_date, $return_date);

        $car = Car::find($car_id);

        $car_price = floatval(preg_replace('/[^\d\.]/', '', $car->price));


        if ((strtotime($pick_up_date) - strtotime($return_date)) < 0)
        {
            $reservation = Reservation::where('user_id', $user_id)->where('closed',false)->first();

            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $current_balance += $car_price;
            $reservation->current_balance = money_format('%i', $current_balance);

            foreach ($dates as $date)
            {
                UnavailableCar::create(['date'=>$date,'closed' => false, 'reservation_id' => $reservation->id, 'car_id' => $car_id]);
            }

            $reservation->save();

            return "The car was added to your reservation";
        }

        else
        {
            return "The dates you have entered are incongruent";
        }
    }


}
