<?php  
  
namespace App\Http\Controllers;   
  
use Illuminate\Http\Request;  
use App\Journey;  
use App\Airport;
use App\Flight;
  
class JourneyController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function index()  
    {  
        return Journey::all();  
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
        return Journey::create($request->all());  
    }  
  
    /**  
     * Display the specified resource.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function show($id)  
    {  
        return Journey::find($id);   
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
        Journey::find($id)->update($request->all());   
        return "Journey {$id} updated!"; 
    }  
  
    /**  
     * Remove the specified resource from storage.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function destroy($id)  
    {  
        Journey::destroy($id); 
        return "Journey {$id} was deleted"; 
    }   

    /**  
     * Display a listing of the resource.  
     *  
     * @param int $airport_id
     * @return \Illuminate\Http\Response  
     */  
    public function searchDepartureJourneysByAirport($airport_id)  
    {  
        $departureJourneys = Airport::find($airport_id)->departure_journeys;
        return $departureJourneys;
    } 

    /**  
     * Display a listing of the resource.  
     *  
     * @param int $airport_id
     * @return \Illuminate\Http\Response  
     */  
    public function searchArrivalJourneysByAirport($airport_id)  
    {  
        $arrivalJourneys = Airport::find($airport_id)->arrival_journeys;
        return $arrivalJourneys;
    } 

    /**  
     * Display a listing of the resource.  
     *  
     * @param int $airport_id
     * @return \Illuminate\Http\Response  
     */  
    public function searchJourneysByAirport($airport_id)  
    {  
        $journeys = collect([]);
        $departureJourneys = Airport::find($airport_id)->departure_journeys;
        $arrivalJourneys = Airport::find($airport_id)->arrival_journeys;
        $journeys = $journeys->push($departureJourneys);
        $journeys = $journeys->push($arrivalJourneys);
        return $journeys;
    } 
    
    /**  
     * Display a listing of the resource.  
     *  
     * @param int $airport_id
     * @return \Illuminate\Http\Response  
     */  
    public function searchJourneysByFlight($flight_id)
    {
        $journeys = Flight::find($flight_id)->journeys;
        return $journeys;
    }
}