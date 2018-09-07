<?php  
  
namespace App\Http\Controllers;  
  
use App\Airline;
use App\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Flight;  
use App\Seat;
use App\Airport;
use App\Journey;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller  
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = Flight::all();
        return view('despevago.dashboard.air_flights.flight.index',['flights' => $flights]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airlines = Airline::all();
        $airlines_name = array();

        foreach ($airlines as $airline)
        {
            $airlines_name[$airline->id] = $airline->name;
        }

        return view('despevago.dashboard.air_flights.flight.create',["airlines_name" => $airlines_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight = (new Flight())->fill($request->all());
        $flight->save();
        UserHistory::create(['action_type' => "Create",'action' => 'Created the flight with id: '.$flight->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return view('despevago.dashboard.air_flights.flight.view', ['flight' => $flight]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flight = Flight::find($id);
        $seats = $flight->seats;
        return view('despevago.dashboard.air_flights.flight.view', ['flight' => $flight,'seats' => $seats]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flight = Flight::find($id);
        $airlines = Airline::all();
        $airlines_name = array();

        foreach ($airlines as $airline)
        {
            $airlines_name[$airline->id] = $airline->name;
        }


        return view('despevago.dashboard.air_flights.flight.edit', ["flight" => $flight, "airlines_name" => $airlines_name]);
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
        $flight = Flight::find($id)->fill($request->all());
        $flight->save();
        UserHistory::create(['action_type' => "Update",'action' => 'Updated the flight with id: '.$flight->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return view('despevago.dashboard.air_flights.flight.view', ['flight' => $flight]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flight = Flight::find($id);
        Flight::destroy($id);

        UserHistory::create(['action_type' => "Delete",'action' => 'Deleted the flight with id: '.$flight->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect('/dashboard/flight')->with('status', 'Flight '.$flight->name.' ID:'.$flight->id.' has been deleted');

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
    public function searchFlightsByFlight($airline_id)
    {  
        $flights = Flight::find($airline_id)->flights;
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