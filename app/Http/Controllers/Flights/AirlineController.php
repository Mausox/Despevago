<?php  
  
namespace App\Http\Controllers;   
  
use Illuminate\Http\Request;  
use App\Airline;  
use App\AirlineContact;
use App\Flight;
  
class AirlineController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function index()  
    {  
        return Airline::all();  
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
        return Airline::create($request->all());  
    }  
  
    /**  
     * Display the specified resource.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function show($id)  
    {  
        return Airline::find($id);   
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
        Airline::find($id)->update($request->all());   
        return "Airline {$id} updated!"; 
    }  
  
    /**  
     * Remove the specified resource from storage.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function destroy($id)  
    {  
        Airline::destroy($id); 
        return "Airline {$id} was deleted"; 
    }

    /**  
     * Display the specified resource.  
     *  
     * @param  int  $airline_contact_id  
     * @return \Illuminate\Http\Response  
     */   
    public function searchAirlineByAirlineContact($airline_contact_id)
    {
        $airline = AirlineContact::find($airline_contact_id)->airline;
        return $airline;
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