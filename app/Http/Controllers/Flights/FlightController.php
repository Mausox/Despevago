<?php  
  
namespace App\Http\Controllers;  
  
use Illuminate\Http\Request;  
use App\Flight;  
use App\Seat;
use App\Airline;
use App\Airport;
use App\Journey;

class FlightController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function index()  
    {  
        return Flight::all();  
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
        return Flight::create($request->all());  
    }  
  
    /**  
     * Display the specified resource.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function show($id)  
    {  
        return Flight::find($id);   
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
        Flight::find($id)->update($request->all());   
        return "Flight {$id} updated!"; 
    }  
  
    /**  
     * Remove the specified resource from storage.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function destroy($id)  
    {  
        Flight::destroy($id); 
        return "Flight {$id} was deleted"; 
    }  

    /**  
     * Display the specified resource.  
     *  
     * @param  int  $seat_id  
     * @return \Illuminate\Http\Response  
     */ 
    public function searchFlightBySeat($seat_id)
    {
        $flight = Seat::find($seat_id)->flight;
        return $flight;
    }    

    /**  
     * Display a listing of the resource.  
     *  
     * @param int $airline_id
     * @return \Illuminate\Http\Response  
     */  
    public function searchFlightsByAirline($airline_id)  
    {  
        $flights = Airline::find($airline_id)->flights;
        return $flights;
    }  

    /**  
     * Display the specified resource.  
     *  
     * @param  int  $airport_id  
     * @return \Illuminate\Http\Response  
     */  
    public function searchFlightsByAirport($airport_id)
    {
        $flights = Airport::find($airport_id)->flights;
        return $flights;
    }

    /**  
     * Display the specified resource.  
     *  
     * @param  int  $journey_id  
     * @return \Illuminate\Http\Response  
     */  
    public function searchFlightByJourney($journey_id)
    {
        $flight = Journey::find($journey_id)->flight;
        return $flight;
    }
}