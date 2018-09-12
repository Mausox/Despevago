<?php

namespace App\Http\Controllers;

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

    public function searchPackagesCarByCity(Request $request)
    {
        //$radio = $request->option;
        $city = City::where('name',$request->arrival_city)->first();
        $city_id = $city->id;
        $packages = City::find($city_id)->car_flight_packages;
        return view('despevago.packages.carFlightPackage.resultPackage', compact('packages', 'city'));
        
        /*
        if($request->option == 0)
        {
            //Vuelo+Auto
            $packages = City::find($city_id)->car_flight_packages;
            //return $packages;
            return view('despevago.packages.carFlightPackage.index', compact('packages', 'city'));
        }
        else{
            //Vuelo+Hotel
            $packages = City::find($city_id)->room_flight_packages;
            return "vuelo+hotel";
            //return view('despevago.packages.roomFlightPackage.index', compact('packages', 'city'));   
        }*/
    }

    public function searchPackagesRoomByCity(Request $request)
    {
        $city = City::where('name',$request->arrival_city)->first();
        $city_id = $city->id;
        $packages = City::find($city_id)->car_flight_packages;
        return view('despevago.packages.roomFlightPackage.resultPackage', compact('packages', 'city')); 



    }
}
