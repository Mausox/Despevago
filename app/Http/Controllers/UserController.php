<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use App\Reservation;
use App\Room;
use App\UnavailableRoom;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
        $user = User::create($request->all());
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('despevago.users.profileEdit', ['user' => $user]);
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
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'telephone' => 'required',
            'address' => 'required',
        ]);
        User::find($id)->update($request->all());
        return redirect('/user/profile')->with('status', 'Your profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return "The User ID: {$id} was removed!";
    }

    //Función que entrega todas las reservas de un usuario, considerando toda la información necesaria para que el
    //usuario sepa en caso del hotel por ejemplo, su habitación, hotel, ciudad, y días de la estadía.
    //Entradas: $user_id
    public function userReservations($user_id)
    {
        $reservations = Reservation::where('user_id',$user_id)->where('closed',true)->get();
        $rooms_array = array();


        foreach ($reservations as $reservation)
        {

            //rooms
            $unavailable_rooms = $reservation->unavailable_rooms()->where('closed',true)->get();
            foreach ($unavailable_rooms as $unavailable_room)
            {
                $room_id = $unavailable_room->room_id;
                $room = Room::find($room_id);
                $hotel = Hotel::find($room->hotel_id);
                $city = City::find($hotel->city_id);
                $room_dates = UnavailableRoom::Select('date')->where("room_id",$room_id)->where("reservation_id", $reservation->id)->get();

                $room_data = array
                (
                    "room" => $room,
                    "hotel" => $hotel,
                    "city" => $city,
                    "dates" => $room_dates
                );

                if(!(in_array($room_data, $rooms_array)))
                {
                    $rooms_array[] = $room_data;
                }
            }
        }

        return $rooms_array;
    }

    public function userProfile(Request $request){
        return view('despevago.users.profile', ['user' => $request->user()]);
    }
}
