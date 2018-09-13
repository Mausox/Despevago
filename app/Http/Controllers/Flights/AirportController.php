<?php  
  
namespace App\Http\Controllers;  
  
use App\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Airport;  
use App\City;
use App\Flight;
use App\Journey;
use App\Transfer;
use Illuminate\Support\Facades\Auth;

class AirportController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function index()  
    {  
        $airports = Airport::all();
        return view('despevago.dashboard.air_flights.airport.index',['airports' => $airports]);

    }  
  
    /**  
     * Show the form for creating a new resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function create()  
    {
        $cities = City::all();
        $citiesName = array();

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }

        return view('despevago.dashboard..air_flights.airport.create', ["cities" => $citiesName]);
    }  
  
    /**  
     * Store a newly created resource in storage.  
     *  
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\Response  
     */  
    public function store(Request $request)  
    {
        $airport = (new Airport())->fill($request->all());
        $airport->city_id = $request->city_id;
        $airport->save();
        UserHistory::create(['action_type' => "Create",'action' => 'Created the airport with id: '.$airport->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return view('despevago.dashboard.air_flights.airport.view', ['airport' => $airport]);
    }  
  
    /**  
     * Display the specified resource.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function show($id)  
    {  
        $airport = Airport::find($id);

        return view('despevago.dashboard.air_flights.airport.view', ['airport' => $airport]);

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

        $airport = Airport::find($id);

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }
        return view('despevago.dashboard..air_flights.airport.edit', ["cities" => $citiesName,"airport" => $airport]);
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
        $airport = Airport::find($id)->fill($request->all());
        $airport->city_id = $request->city_id;
        $airport->save();
        UserHistory::create(['action_type' => "Update",'action' => 'Updated the airport with id: '.$airport->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return view('despevago.dashboard.air_flights.airport.view', ['airport' => $airport]);
    }  
  
    /**  
     * Remove the specified resource from storage.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function destroy($id)  
    {
        $airport = Airport::find($id);
        Airport::destroy($id);

        UserHistory::create(['action_type' => "Delete",'action' => 'Deleted the airport with id: '.$airport->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect('/dashboard/airport')->with('status', 'Airport '.$airport->name.' ID:'.$airport->id.' has been deleted');

    }

    /**  
     * Display the specified resource.  
     *  
     * @param  int  $city_id  
     * @return \Illuminate\Http\Response  
     */  
    public function searchAirportsByCity($city_id)
    {
        $airports = City::find($city_id)->airports;
        return $airports;
    }

    /**  
     * Display the specified resource.  
     *  
     * @param  int  $flight_id  
     * @return \Illuminate\Http\Response  
     */  
    public function searchAirportByFlight($flight_id)
    {
        $airport = Flight::find($flight_id)->airport;
        return $airport;
    }

    /**  
     * Display the specified resource.  
     * 
     * @param  int  $transfer_id  
     * @return \Illuminate\Http\Response  
     */  
    public function searchAirportByTransfer($transfer_id)  
    {  
        $airport = Transfer::find($transfer_id)->airport;
        return $airport; 
    }  

    /**  
     * Display the specified resource.  
     * 
     * @param  int  $journey_id  
     * @return \Illuminate\Http\Response  
     */  
    public function searchDepartureAirportByJourney($journey_id)  
    {  
        $departure_airport = Journey::find($journey_id)->departure_airport;
        return $departure_airport; 
    }  

    /**  
     * Display the specified resource.  
     * 
     * @param  int  $journey_id  
     * @return \Illuminate\Http\Response  
     */  
    public function searchArrivalAirportByJourney($journey_id)  
    {  
        $arrival_airport = Journey::find($journey_id)->arrival_airport;
        return $arrival_airport; 
    }  
    
    /**  
     * Display a listing of the resource.  
     * @param int $journey_id
     * @return \Illuminate\Http\Response  
     */  
    public function searchAirportsByJourney($journey_id)
    {
        $airports = collect([]);
        $departure_airport = Journey::find($journey_id)->departure_airport;
        $arrival_airport = Journey::find($journey_id)->arrival_airport;
        $airports = $airports->push($departure_airport);
        $airports = $airports->push($arrival_airport);
        return $airports;
    }
}