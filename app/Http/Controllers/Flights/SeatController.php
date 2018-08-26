<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seat;
use App\Passenger;
use App\Flight;
use App\ClassType;

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
        return Seat::create($request->all());
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
