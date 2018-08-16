<?php   
   
namespace App\Http\Controllers;   
   
use Illuminate\Http\Request;   
use App\AirlineContact;   
   
class AirlineContactController extends Controller   
{   
    /**   
     * Display a listing of the resource.   
     *   
     * @return \Illuminate\Http\Response   
     */   
    public function index()   
    {   
        return AirlineContact::all();   
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
        return AirlineContact::create($request->all());   
    }   
   
    /**   
     * Display the specified resource.   
     *   
     * @param  int  $id   
     * @return \Illuminate\Http\Response   
     */   
    public function show($id)   
    {   
        return AirlineContact::find($id);    
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
        AirlineContact::find($id)->update($request->all());    
        return "AirlineContact {$id} updated!";  
    }   
   
    /**   
     * Remove the specified resource from storage.   
     *   
     * @param  int  $id   
     * @return \Illuminate\Http\Response   
     */   
    public function destroy($id)   
    {   
        AirlineContact::destroy($id);  
        return "AirlineContact {$id} was deleted";  
    }   
} 