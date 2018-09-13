<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use App\City;

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

        $car_id = $request->car_id;

        return view('despevago.packages.carFlightPackage.resultCars',[
            "car_id" => $car_id,
            "departure_city" => $departure_city,
            "arrival_city" => $arrival_city,
            "departure_date" => $departure_date,
            "arrival_date" => $arrival_date,
            "passenger_number" => $passengers_number]);

        /*
        $city = City::where('name',$request->arrival_city)->first();
        $departure_city = $request->departure_city;
        $arrival_city = $request->arrival_city;
        $departure_date = $request->departure_date;
        $arrival_date = $request->arrival_date;
        $passengers_number = $request->passengers_number;
        //------
        $seat_id = $request->seat_id;
        return view('despevago.packages.carFlightPackage.resultPackage', ["city" => $city, "saet_id" => $seat_id]); //seat_id
        */
    }

    public function searchCarsByCity(Request $request)
    {
        //$city = City::where('name', $request->arrival_city)->first();

        $city = City::where('name',$request->arrival_city)->first();
        $arrival_city = $request->arrival_city;
        $departure_city = $request->departure_city;
        $departure_date = $request->departure_date;
        $arrival_date = $request->arrival_date;
        $passengers_number = $request->passengers_number;


        $cars = Car::whereHas('branch_office', function ($query) use ($city){
            $query->where('city_id', $city->id);
        })->get();

        return view('despevago.packages.carFlightPackage.resultCars',[
                "cars" => $cars,
                "departure_city" => $departure_city,
                "arrival_city" => $arrival_city,
                "departure_date" => $departure_date,
                "arrival_date" => $arrival_date,
                "passengers_number" => $passengers_number]);
        //-------
        /*
        $city = $request->city;

        $seat_id = $request->seat_id;

        $cars = Car::whereHas('branch_office', function ($query) use ($city){
            $query->where('city_id', $city->id);
        })->get();

        return view('despevago.packages.carFlightPackage.resultCars', ["city" => $city, "seat_id" => $seat_id, "cars" => $cars]);
        */
    }

    public function searchPackagesRoomByCity(Request $request)
    {
        $city = City::where('name',$request->arrival_city)->first();
        $city_id = $city->id;
        $packages = City::find($city_id)->car_flight_packages;
        return view('despevago.packages.roomFlightPackage.resultPackage', compact('packages', 'city')); 



    }
}
