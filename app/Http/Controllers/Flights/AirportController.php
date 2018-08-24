<?php  
  
namespace App\Http\Controllers;  
  
use Illuminate\Http\Request;  
use App\Airport;  
use App\City;
  
class AirportController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function index()  
    {  
        return Airport::all();  
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
        return Airport::create($request->all());  
    }  
  
    /**  
     * Display the specified resource.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function show($id)  
    {  
        return Airport::find($id);   
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
        Airport::find($id)->update($request->all());   
        return "Airport {$id} updated!"; 
    }  
  
    /**  
     * Remove the specified resource from storage.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function destroy($id)  
    {  
        Airport::destroy($id); 
        return "Airport {$id} was deleted"; 
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
}