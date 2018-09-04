<?php

namespace App\Http\Controllers;

use App\City;
use App\Hotel;
use App\HotelContact;
use Illuminate\Http\Request;

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

        return view('despevago.hotel.createHotel', ["cities" => $citiesName]);
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
        return redirect()->route('hotels.show', [$hotel->id]);
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
        $hotelContacts = $hotel->hotelContacts->all();
        $contactsNumber = array();

        foreach ($hotelContacts as $hotelContact)
        {
            $contactsNumber[] = $hotelContact->telephone;
        }

        $city = City::find($hotel->city_id);
        return view('despevago.hotel.showHotel', ['hotel' => $hotel, 'city' => $city->name, 'contacts' => $contactsNumber]);
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

    //Función que permite la búsqueda de un hotel y su contacto en una ciudad en específico.
    //Entradas: city_id
    //Tipo: GET
    public function searchHotelByCity($city_id)
    {
        $hotels = Hotel::where('city_id',$city_id)->get();
        $data = array();
        foreach ($hotels as $hotel)
        {
            $hotel_contact = HotelContact::where('hotel_id',$hotel->id)->get();
            $data[] = array
            (
                "hotel" => $hotel,
                "hotel_contact" => $hotel_contact
            );
        }
        return $data;
    }
}
