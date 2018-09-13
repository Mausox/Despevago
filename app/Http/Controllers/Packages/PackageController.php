<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use App\City;
use App\Flight;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Search flights according to parameters
    public function searchFlights(Request $request)
    {

        $city = City::where('name',$request->arrival_city)->first();
        $departure_city = $request->departure_city;
        $arrival_city = $request->arrival_city;
        $departure_date = $request->departure_date;
        $arrival_date = $request->arrival_date;
        $passengers_number = $request->passengers_number;

        $departure_city = City::where("name", $departure_city)->first();
        $arrival_city = City::where("name", $arrival_city)->first();

        $arrivalAirports = City::find($arrival_city->id)->airports->first();
        $departureAirports = City::find($departure_city->id)->airports->first();

        $departure_flights = Flight::whereHas('Journeys', function($query) use ($departure_date, $departureAirports){
            $query->where([['departure_date', $departure_date],['departure_airport_id', $departureAirports->id]]);
        })->get();

        $arrival_flights = Flight::whereHas('Journeys', function($query) use ($arrival_date, $arrivalAirports){
            $query->where([['departure_date', $arrival_date],['departure_airport_id', $arrivalAirports->id]]);
        })->get();

        if($departure_flights->isEmpty())
        {
            return redirect()->route('searchFlight')->with('error','Flights not found in this date (Departure date): '.$departure_date);
        }
        if($arrival_flights->isEmpty())
        {
            return redirect()->route('searchFlight')->with('error','Flights not found in date (Arrival date): '.$arrival_date);
        }


        return view('despevago.packages.carFlightPackage.resultFlight',
            [
                'departure_flights' => $departure_flights,
                'arrival_flights' => $arrival_flights,
                'departure_city' => $departure_city->name,
                'arrival_city' => $arrival_city->name,
                'departure_date' => $departure_date,
                'arrival_date' => $arrival_date,
                'passengers' => $passengers_number,
            ]);

    }

    public function searchFlightsForRoom(Request $request)
    {
        //$radio = $request->option;
        $city = City::where('name',$request->arrival_city)->first();
        $departure_city = $request->departure_city;
        $arrival_city = $request->arrival_city;
        $departure_date = $request->departure_date;
        $arrival_date = $request->arrival_date;
        $number_adults = $request->number_adults;
        $number_children = $request->number_children;
        $number_room = $request->number_room;


        return view('despevago.packages.roomFlightPackage.resultPackage', ["city" => $city]);
    }

    public function searchCarsByCity(Request $request)
    {


        $city_name = $request->city;

        $seat_id = $request->seat_id;

        $city = City::where("name", $city_name)->first();

        $cars = Car::whereHas('branch_office', function ($query) use ($city){
            $query->where('city_id', $city->id);
        })->get();

        return view('despevago.packages.carFlightPackage.resultCars', ["city" => $city, "seat_id" => $seat_id, "cars" => $cars]);

    }

    public function searchPackagesRoomByCity(Request $request)
    {
        $city = City::where('name',$request->arrival_city)->first();
        $city_id = $city->id;
        $packages = City::find($city_id)->car_flight_packages;
        return view('despevago.packages.roomFlightPackage.resultPackage', compact('packages', 'city')); 



    }
}
