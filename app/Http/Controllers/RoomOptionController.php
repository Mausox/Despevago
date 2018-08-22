<?php  
  
namespace App\Http\Controllers;  
  
use Illuminate\Http\Request;  
use App\RoomOption;  
  
class RoomOptionController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function index()  
    {  
        return RoomOption::all();  
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
        return RoomOption::create($request->all());  
    }  
  
    /**  
     * Display the specified resource.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function show($id)  
    {  
        return RoomOption::find($id);   
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
        RoomOption::find($id)->update($request->all());   
        return "RoomOption {$id} updated!"; 
    }  
  
    /**  
     * Remove the specified resource from storage.  
     *  
     * @param  int  $id  
     * @return \Illuminate\Http\Response  
     */  
    public function destroy($id)  
    {  
        RoomOption::destroy($id); 
        return "RoomOption {$id} was deleted"; 
    }  
}