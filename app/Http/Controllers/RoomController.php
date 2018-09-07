<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomOption;
use App\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return $rooms;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hotel_id)
    {
        $room_options = RoomOption::all();

        $room_options_name = array();

        foreach ($room_options as $room_option)
        {
            $room_options_name[$room_option->id] = $room_option->name;
        }
        return view('despevago.dashboard.hotel.room.create',["hotel_id" => $hotel_id, "room_options_name" => $room_options_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = (new Room)->fill($request->all());
        $room->hotel_id = $request->hotel_id;
        $room->room_image = $request->file('room_image')->store('public/rooms');
        $room->save();

        $room_new = Room::find($room->id);
        foreach ($request->room_options as $room_option)
        {
            $room_new->roomOptions()->attach($room_option);
        }
        UserHistory::create(['action_type' => "Store",'action' => 'Stored the room with id: '.$room->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect()->route('rooms.show', [$room->id])->with('status',"La habitación de id: $room->id ha sido creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        $roomOptions = $room->roomOptions;
        return view('despevago.dashboard.hotel.room.view', ['room' => $room, 'roomOptions' => $roomOptions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $room = Room::find($id);
        $room_options = RoomOption::all();
        $room_options_name = array();

        foreach ($room_options as $room_option)
        {
            $room_options_name[$room_option->id] = $room_option->name;
        }

        $actual_room_options = $room->roomOptions;

        return view('despevago.dashboard.hotel.room.edit',["hotel_id" => $room->hotel_id, "room" => $room, "room_options_name" => $room_options_name, "actual_room_options" => $actual_room_options]);
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

        $room = Room::find($id)->fill($request->all());
        if ($request->file())
        {
            $room->room_image = $request->file('room_image')->store('public/rooms');
        }

        $room->save();

        foreach ($request->room_options as $room_option)
        {
            $room->roomOptions()->detach($room_option);
        }

        foreach ($request->room_options as $room_option)
        {
            $room->roomOptions()->attach($room_option);
        }

        UserHistory::create(['action_type' => "Update",'action' => 'Updated the room with id: '.$room->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect()->route('rooms.show', [$room->id])->with('status',"La habitación de id: $room->id ha sido creado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        Room::destroy($id);
        UserHistory::create(['action_type' => "Destroy",'action' => 'Destroyed the room with id: '.$room->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect('/dashboard/hotels/'.$room->hotel_id)->with('status', 'La habitación con ID:'.$room->id.' ha sido eliminado');

    }


    //Función que entrega las habitaciones de un hotel en particular
    //Entradas: hotel_id
    //Tipo: GET
    public function searchRoomsByHotel($hotel_id)
    {
        $rooms = Room::where("hotel_id",$hotel_id)->get();
        return $rooms;
    }
}
