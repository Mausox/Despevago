<?php

namespace App\Http\Controllers;

use App\City;
use App\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Airline;
use App\Flight;
use Illuminate\Support\Facades\Auth;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airlines = Airline::all();
        return view('despevago.dashboard.air_flights.airline.index',['airlines' => $airlines]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('despevago.dashboard.air_flights.airline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $airline = (new Airline())->fill($request->all());
        $airline->telephone = $request->telephone;
        $airline->save();
        UserHistory::create(['action_type' => "Create",'action' => 'Created the airline with id: '.$airline->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return view('despevago.dashboard.air_flights.airline.view', ['airline' => $airline]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airline = Airline::find($id);

        return view('despevago.dashboard.air_flights.airline.view', ['airline' => $airline]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airline = Airline::find($id);

        return view('despevago.dashboard.air_flights.airline.edit', ["airline" => $airline]);
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
        $airline = Airline::find($id)->fill($request->all());
        $airline->save();
        UserHistory::create(['action_type' => "Update",'action' => 'Updated the airline with id: '.$airline->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return view('despevago.dashboard.air_flights.airline.view', ['airline' => $airline]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $airline = Airline::find($id);
        Airline::destroy($id);

        UserHistory::create(['action_type' => "Delete",'action' => 'Deleted the airline with id: '.$airline->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect('/dashboard/airline')->with('status', 'Airline '.$airline->name.' ID:'.$airline->id.' has been deleted');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $flight_id
     * @return \Illuminate\Http\Response
     */
    public function searchAirlineByFlight($flight_id)
    {
        $airline = Flight::find($flight_id)->airline;
        return $airline;
    }
}