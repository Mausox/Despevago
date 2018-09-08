<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use App\Room;
use App\UnavailableRoom;
use App\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('despevago.dashboard.hotel.index',['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param array $data
     * @return view
     */
    public function create()
    {
        $cities = City::all();
        $citiesName = array();

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }

        return view('despevago.dashboard.hotel.create', ["cities" => $citiesName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = (new Hotel)->fill($request->all());
        $hotel->score = 0;
        $hotel->hotel_image = $request->file('hotel_image')->store('public/hotels');
        $hotel->save();
        UserHistory::create(['action_type' => "Store",'action' => 'Stored the hotel with id: '.$hotel->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect()->route('hotels.show', [$hotel->id])->with('status',"El hotel ".$hotel->name." ha sido creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);
        $city = City::find($hotel->city_id);
        $rooms = $hotel->rooms;
        return view('despevago.dashboard.hotel.view', ['hotel' => $hotel, 'city' => $city->name, 'rooms' => $rooms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $citiesName = array();

        $hotel = Hotel::find($id);

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }
        return view('despevago.dashboard.hotel.edit', ["cities" => $citiesName,"hotel" => $hotel]);
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
        if ($request->file())
        {
            $hotel->hotel_image = $request->file('hotel_image')->store('public/hotels');

        }
        $hotel->save();
        UserHistory::create(['action_type' => "Update",'action' => 'Updated the hotel with id: '.$hotel->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect('/dashboard/hotels/'.$hotel->id)->with('status', 'Hotel '.$hotel->name.'de ID:'.$hotel->id.' ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        Hotel::destroy($id);

        return redirect('/dashboard/hotels')->with('status', 'Hotel '.$hotel->name.'de ID:'.$hotel->id.' ha sido eliminado');
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
                ['hotels' => $hotels,
                'cities' => $citiesName,
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

        $result_rooms = Room::whereDoesntHave('unavailable_rooms', function ($query) use ($start_date, $end_date){
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
            return view('despevago.hotels.resultHotelRooms', ['hotel' => $hotel, 'rooms' => $result_rooms])->with('status', 'There were no results');
        }

    }
}
