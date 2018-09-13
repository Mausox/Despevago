<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use App\PaymentHistory;
use App\UnavailableCar;
use App\UnavailableRoom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Reservation;
use App\Transfer;
use App\Room;
use App\Seat;
use App\Car;
use App\Activity;
use App\User;
use App\CarFlightPackage;
use App\RoomFlightPackage;
use App\UserHistory;
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

    public function shoppingCart(Request $request)
    {
        $reservation = Reservation::where([
            ['user_id', Auth::user()->id],
            ['closed', false],
        ])->first();

        $SProoms = $reservation->unavailable_rooms;
        $SPactivities = $reservation->activities;
        $SPseats = $reservation->seats;
        $SPtransfers = $reservation->transfers;
        $SPcars = $reservation->unavailable_cars;
        return view('despevago.users.shoppingCart',
            ['unaRooms' => $SProoms,
            'unaCars' => $SPcars,
            'activities' => $SPactivities,
            'seats' => $SPseats,
            'transfers' => $SPtransfers,
            'user' => $request->user()]);
    }


    //Función que finaliza una reserva y "cierra" las reservas en unavailableRooms, cars,etc.
    //Entradas: reservation_id
    //Tipo: POST
    public function finishReservation(Request $request)
    {
        $reservation = Reservation::where([
            ['user_id', Auth::user()->id],
            ['closed', false],
        ])->first();


        $reservation->date = Carbon::now();
        $reservation->hour = Carbon::now();
        $reservation->closed = true;
        $reservation->save();

        //<--------------------------------- Rooms --------------------------------->
        $unavailableRooms = UnavailableRoom::where("reservation_id", $reservation->id)->where("closed", false)->get();
        foreach ($unavailableRooms as $unavailableRoom)
        {
            $user_history = new UserHistory();
            $user_history->date = Carbon::now();
            $user_history->hour = Carbon::now();
            $user_history->user_id = Auth::user()->id;
            $user_history->action = 'User reserved a room';
            $user_history->action_type = 'Purchase';
            $user_history->save();

            $unavailableRoom->closed = true;
            $unavailableRoom->save();
        }


        //<------------------------------ Activities ------------------------------->
        $activities = $reservation->activities()->where('closed',false)->get();
        foreach($activities as $activity)
        {
            $user_history = new UserHistory();
            $user_history->date = Carbon::now();
            $user_history->hour = Carbon::now();
            $user_history->user_id = Auth::user()->id;
            $user_history->action = 'User reserved an activity';
            $user_history->action_type = 'Purchase';
            $user_history->save();

            $activity->pivot->closed = true;
            $activity->pivot->save();
        }

        //<------------------------------ Seats ------------------------------->
        $seats = $reservation->seats()->where('closed',false)->get();
        foreach($seats as $seat)
        {
            $user_history = new UserHistory();
            $user_history->date = Carbon::now();
            $user_history->hour = Carbon::now();
            $user_history->user_id = Auth::user()->id;
            $user_history->action = 'User reserved a flight';
            $user_history->action_type = 'Purchase';
            $user_history->save();

            $seat->pivot->closed = true;
            $seat->pivot->save();
        }

        //<------------------------------ Transfers  ------------------------------->
        $transfers = $reservation->transfers()->where('closed',false)->get();
        foreach($transfers as $transfer)
        {
            $user_history = new UserHistory();
            $user_history->date = Carbon::now();
            $user_history->hour = Carbon::now();
            $user_history->user_id = Auth::user()->id;
            $user_history->action = 'User reserved a transfer';
            $user_history->action_type = 'Purchase';
            $user_history->save();

            $transfer->pivot->closed = true;
            $transfer->pivot->save();
        }

        //<------------------------------ Car Flight Package ------------------------------->
        $carFlightPackages = $reservation->car_flight_packages()->where('closed',false)->get();
        foreach($carFlightPackages as $carFlightPackage)
        {
            $user_history = new UserHistory();
            $user_history->date = Carbon::now();
            $user_history->hour = Carbon::now();
            $user_history->user_id = Auth::user()->id;
            $user_history->action = 'User reserved a car flight package';
            $user_history->action_type = 'Purchase';
            $user_history->save();

            $carFlightPackage->pivot->closed = true;
            $carFlightPackage->pivot->save();
        }

        //<------------------------------ Room Flight Package ------------------------------->
        $roomFlightPackages = $reservation->room_flight_packages()->where('closed',false)->get();
        foreach($roomFlightPackages as $roomFlightPackage)
        {
            $user_history = new UserHistory();
            $user_history->date = Carbon::now();
            $user_history->hour = Carbon::now();
            $user_history->user_id = Auth::user()->id;
            $user_history->action = 'User reserved a room flight package';
            $user_history->action_type = 'Purchase';
            $user_history->save();

            $roomFlightPackage->pivot->closed = true;
            $roomFlightPackage->pivot->save();
        }

        //<------------------------------ UnavailableCar ------------------------------->
        $unavailableCars = UnavailableCar::where("reservation_id", $reservation->id)->where("closed", false)->get();
        foreach ($unavailableCars as $unavailableCar)
        {
            $user_history = new UserHistory();
            $user_history->date = Carbon::now();
            $user_history->hour = Carbon::now();
            $user_history->user_id = Auth::user()->id;
            $user_history->action = 'User reserved a car';
            $user_history->action_type = 'Purchase';
            $user_history->save();

            $unavailableCar->closed = true;
            $unavailableCar->save();
        }


        return redirect('user/profile')->with('status', 'You have ended your transaction succesfully');
    }

    public function removeReservation(Request $request)
    {
        $service = $request->service;

        $reservation = Reservation::where([
            ['user_id', Auth::user()->id],
            ['closed', false],
        ])->first();

        if($service == 'activity') {
            $reservation->activities()->detach($request->activity_id);
            return redirect('user/shopping_cart')->with('status', 'Activity has been removed');
        }elseif($service == 'room'){
            UnavailableRoom::destroy($request->unavailable_room_id);
            return redirect('user/shopping_cart')->with('status', 'Room has been removed');
        }elseif($service == 'seat'){
            $reservation->seats()->detach($request->seat_id);
            return redirect('user/shopping_cart')->with('status', 'Seat has been removed');
        }elseif($service == 'transfer'){
            $reservation->transfers()->detach($request->transfer_id);
            return redirect('user/shopping_cart')->with('status', 'Transfer has been removed');
        }elseif($service == 'car'){
            UnavailableCar::destroy($request->unavailable_car_id);
            return redirect('user/shopping_cart')->with('status', 'Car has been removed');
        }
    }
    //Función que permite reservar una habitación
    //Entradas: room_id, adults_number, children_number, user_id, date (arreglo con fechas en las que será solicitada la habitación)
    //Tipo: POST
    public function roomReservation(Request $request)
    {
        $room_id = $request->room_id;
        $adults_number = $request->adults_number;
        $children_number = $request->children_number;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $user_id = Auth::user()->id;

        $room = Room::find($room_id);
        //To obtain the open reservation of the user
        $reservation = Reservation::where([
            ['user_id', $user_id],
            ['closed', false],
        ])->first();

        $adult_price = floatval(preg_replace('/[^\d\.]/', '', $room->adult_price));
        $child_price = floatval(preg_replace('/[^\d\.]/', '', $room->child_price));


        $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
        $current_balance += ($adult_price*$adults_number + $child_price*$children_number);
        $reservation->current_balance = money_format('%i',$current_balance);

        $i = Carbon::parse($start_date);;
        $end_date_time = Carbon::parse($end_date)->addDay();;
        while($i != $end_date_time){
            $unavailable_room = new UnavailableRoom();
            $unavailable_room->date = $i;
            $unavailable_room->reservation_id = $reservation->id;
            $unavailable_room->room_id = $room->id;
            $unavailable_room->closed = false;
            $unavailable_room->save();
            $i->addDay();
        }
        $reservation->save();


        return redirect("/user/shopping_cart")->with('status',"Your room was added to you reservation");

    }

    //Función que permite reservar una actividad
    //Entradas: activity_id,user_id
    //Tipo: POST
    public function activityReservation(Request $request)
    {
        $activity_id = $request->activity_id;
        $activity = Activity::find($activity_id);
        $user_id = Auth::user()->id;
        
        $adult_number = $request->adult_number;
        $child_number = $request->child_number;
        $people_number = $adult_number+$child_number;

        $adult_price = floatval(preg_replace('/[^\d\.]/', '', $activity->price_adult));
        $child_price = floatval(preg_replace('/[^\d\.]/', '', $activity->price_child));


        if($activity->capacity - $people_number > 0)
        {
            $reservation = Reservation::where('user_id',$user_id)->where('closed',false)->first();

            $adult_total = $adult_price*$adult_number;
            $child_total = $child_price*$child_number;
            
            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $current_balance += $adult_total;
            $current_balance += $child_total;
            $reservation->current_balance = money_format('%i',$current_balance);

            $reservation->activities()->attach($activity_id, ['closed'=>false]);
            $activity->capacity -= $people_number;
            $reservation->save();
            $activity->save();

            return redirect()->route('user.shopping_cart');
        }

        else
        {
            return back()->withInput();
        }
    }


    //Function: Allows user to make a transfer reservation
    //Parameters: transfer_id, user_id, number_people
    //POST
    public function transferReservation(Request $request)
    {
        $transfer_id = $request->transfer_id;
        $user_id = $request->User()->id;
        $number_people = $request->number_people;

        //To obtain the transfer
        $transfer = Transfer::find($transfer_id);

        //To obtain the open reservation of the user
        $reservation = Reservation::where([
            ['user_id', $user_id],
            ['closed', false],
        ])->first();

        //In case the transfer was already reserved by the user
        if($number_people > $transfer->transfer_car->capacity or $number_people <= 0)
        {
            return back()->withErrors(['The amount of people is not available']);
        }
        else if ($transfer->reservations()->where('transfer_id',$transfer->id)->exists())
        {
            return back()->withErrors(['You have already reserved this transfer']);
        }
        else{

            //Adding the transfer reservation on the pivot table
            $reservation->transfers()->attach($transfer_id,['closed' => false]);
            $transfer->number_people = $number_people;
            $transfer->save();

            //Updating balance on the reservation
            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $transfer_price = floatval(preg_replace('/[^\d\.]/', '', $transfer->price));

            $current_balance += $transfer_price;
            $reservation->current_balance = money_format('%i',$current_balance);
            $reservation->save();

            return redirect()->route('user.shopping_cart');
        }
    }

    ////Function: Allows user to make a transfer reservation
    //Parameters: seat_id, user_id, passenger_id
    //POST
    public function seatReservation(Request $request)
    {
        $seat_id = $request->seat_id;
        $user_id = $request->user_id;
        $passenger_id = $request->passenger_id;

        $seat = Seat::find($seat_id);

        //To obtain the open reservation of the user
        $reservation = Reservation::where([
            ['user_id', $user_id],
            ['closed', false],
        ])->first();


        if($seat->status == 0){

            $seat->status = 1;
            $seat->passenger_id = $passenger_id;
            $reservation->seats()->attach($seat_id,['closed' => false]);
            $seat->save();

            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $seat_price = floatval(preg_replace('/[^\d\.]/', '', $seat->price));
            $current_balance += $seat_price;
            $reservation->current_balance = money_format('%i',$current_balance);
            $reservation->save();

            return "The seat was reserved successfully";
        }
        else{
            return "the seat is no longer available";
        }
    }

    ////Function: Allows user to make a car flight package reservation
    //Parameters: seat_id, car_id, user_id, car_flight_package_id
    //POST
    public function carFlightPackageReservation(Request $request)
    {
        $seat_id = $request->seat_id;
        $car_id = $request->car_id;
        $user_id = $request->User()->id;
        $package_id = $request->car_flight_package_id;

        //To obtain the open reservation of the user
        $reservation = Reservation::where([
            ['user_id', $user_id],
            ['closed', false],
        ])->first();
        $seat = Seat::find($seat_id);
        $car = Car:: find($car_id);
        $package = CarFlightPackage::find($package_id);

        if ($package->reservations()->where('car_flight_package_id',$package->id)->exists()){
            return "The package is no longer available";
        }
        else{

            $reservation->car_flight_packages()->attach($package_id ,['closed' => false]);

            $seat->status = 1;
            $seat->status->save();
            
            $package->seat_id = $seat->id;
            $package->car_id = $car->id;
            $package->save();

            $seat_price = floatval(preg_replace('/[^\d\.]/', '', $seat->price));
            $car_price = floatval(preg_replace('/[^\d\.]/', '', $car->price));
            $package_price = ($seat_price + $car_price)*($package->discount/100);

            //Updating balance on the reservation
            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $current_balance += $package_price;
            $reservation->current_balance = money_format('%i',$current_balance);
            $reservation->save();

            return "The package has been reserved";
        }



    }

    ////Function: Allows user to make a room flight package reservation
    //Parameters: seat_id, room_id, user_id, room_flight_package_id
    //POST
    public function roomFlightPackageReservation(Request $request)
    {
        $seat_id = $request->seat_id;
        $room_id = $request->room_id;
        $user_id = $request->User()->id;
        $package_id = $request->room_flight_package_id;

        //To obtain the open reservation of the user
        $reservation = Reservation::where([
            ['user_id', $user_id],
            ['closed', false],
        ])->first();
        $seat = Seat::find($seat_id);
        $room = Room:: find($room_id);
        $package = RoomFlightPackage::find($package_id);

        if ($package->reservations()->where('room_flight_package_id', $package->id)->exists()) {
            return "The room flight package is no longer available";
        } else {

            $reservation->room_flight_packages()->attach($package_id, ['closed' => false]);

            $seat->status = 1;
            $seat->status->save();

            $package->seat_id = $seat->id;
            $package->room_id = $room->id;
            $package->save();

            $seat_price = floatval(preg_replace('/[^\d\.]/', '', $seat->price));
            $room_price = floatval(preg_replace('/[^\d\.]/', '', $room->price));
            $package_price = ($seat_price + $room_price) * ($package->discount / 100);

            //Updating balance on the reservation
            $current_balance = floatval(preg_replace('/[^\d\.]/', '', $reservation->current_balance));
            $current_balance += $package_price;
            $reservation->current_balance = money_format('%i', $current_balance);
            $reservation->save();

            return "The room flight package has been reserved";
        }
    }


    public function carReservation(Request $request)
    {
        $car_id = $request->car_id;
        $user_id = Auth::user()->id;
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

            UnavailableCar::create(['pick_up_date'=>$pick_up_date,'return_date' => $return_date,'closed' => false, 'reservation_id' => $reservation->id, 'car_id' => $car_id]);

            $reservation->save();

            return redirect("/user/shopping_cart")->with('status',"Your Car was added to you reservation");
        }

        else
        {
            return redirect("/search/cars/form")->with('status',"We can't resolve your reservation, please, try in another date");
        }
    }


}
