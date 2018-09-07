<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelContact;
use App\Room;
use Illuminate\Http\Request;
use App\City;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Hotel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param array $data
     * @return void
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = Hotel::create($request->all());
        return $hotel;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Hotel::find($id);
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
        Hotel::find($id)->update($request->all());
        $hotel = Hotel::find($id);
        return $hotel;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hotel::destroy($id);
        return "Se eliminó el hotel de id: ".$id;
    }


    public function searchFormHotel(){
        $cities = City::all();
        $citiesName = array();

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }
        return view('despevago.hotels.searchHotel', ['cities' => $citiesName]);
    }

    //Función que permite la búsqueda de un hotel y su contacto en una ciudad en específico.
    //Entradas: city_id
    //Tipo: GET
    public function searchHotelByCity(Request $request)
    {
        $cities = City::all();
        $citiesName = array();
        $number_adults = $request->number_adults;
        $number_children = $request->number_children;
        $number_room = $request->number_room;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }

        $hotels = Hotel::where('city_id',$request->city_id)->get();

        return view('despevago.hotels.resultHotel',
                ['hotels' => $hotels, 'cities' => $citiesName,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'number_children' => $number_children,
                    'number_adults' => $number_adults,
                    'number_room' => $number_room]);
    }
    //Search room of hotel according to user parameters
    public function searchHotelRoom(Request $request)
    {
        $hotel = Hotel::find($request->hotel_id);
        $number_adults = $request->number_adults;
        $number_children = $request->number_children;
        $number_room = $request->number_room;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $number_people = $number_adults + $number_children;

        $result_rooms = Room::whereDoesntHave('unavailableRooms', function ($query) use ($start_date, $end_date){
            $query->where('date','>',$start_date)->where('date','<',$end_date);
        })->where([
            ['capacity','>=', $number_people],
            ['hotel_id', $hotel->id]
        ])->get();

        if($result_rooms->count() >= $number_room){
            return view('despevago.hotels.resultHotelRooms',
                ['hotel' => $hotel,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'number_children' => $number_children,
                'number_adults' => $number_adults,
                'rooms' => $result_rooms]);
        }else{
            return view('despevago.hotels.resultHotelRooms', ['hotel' => $hotel, 'rooms' => $result_rooms])->with('message', 'There were no results');
        }

    }
}
