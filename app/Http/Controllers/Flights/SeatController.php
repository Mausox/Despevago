<?php

namespace App\Http\Controllers;

use App\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Seat;
use App\Passenger;
use App\Flight;
use App\ClassType;
use Illuminate\Support\Facades\Auth;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Seat::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($flight_id)
    {
        $class_types = ClassType::all();
        $class_types_name = array();

        foreach ($class_types as $class_type)
        {
            $class_types_name[$class_type->id] = $class_type->name;
        }

        return view('despevago.dashboard.air_flights.flight.seat.create',["flight_id" => $flight_id,"class_types_name" => $class_types_name]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seat = (new Seat())->fill($request->all());
        $seat->save();

        UserHistory::create(['action_type' => "Create",'action' => 'Created the seat with id: '.$seat->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect()->route('flight.show', [$seat->flight_id])->with('status',"The seat with id: $seat->id has beeen created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Seat::find($id); 
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
        Seat::find($id)->update($request->all());
        return "Seat {$id} updated!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seat::destroy($id);
        return "Seat {$id} was deleted";
    }

    /**  
     * Display the specified resource.  
     *  
     * @param  int  $passenger_id  
     * @return \Illuminate\Http\Response  
     */ 
    public function searchSeatByPassenger($passenger_id)
    {
        $seat = Passenger::find($passenger_id)->seat;
        return $seat;
    }

    /**  
     * Display a listing of the resource.  
     *  
     * @param  int  $flight_id  
     * @return \Illuminate\Http\Response  
     */ 
    public function searchSeatsByFlight($flight_id)
    {
        $seats = Flight::find($flight_id)->seats;
        return $seats;
    }

    /**  
     * Display a listing of the resource.  
     * @param  int  $class_type_id  
     * @return \Illuminate\Http\Response  
     */ 
    public function searchSeatsByClassType($class_type_id)
    {
        $seats = ClassType::find($class_type_id)->seats;
        return $seats;
    }
}
