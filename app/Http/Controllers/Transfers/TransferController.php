<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\TransferCar;
use App\Airport;
use App\Hotel;


class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Transfer::all();
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
        $transfer = Transfer::create($request->all());
        return $transfer;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Transfer::find($id);
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
        Transfer::find($id)->update($request->all());
        return "The transfer ID: {$id} was updated!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transfer::destroy($id);
        return "The transfer ID: {$id} was removed!";
    }

    /**  
     * Display a listing of the resource.  
     * 
     * @param  int  $airport_id  
     * @return \Illuminate\Http\Response  
     */  

    public function searchTransfersByAirport($airport_id)
    {
        $transfers = Airport::find($airport_id)->transfers;
        return $transfers;
    }

    public function searchTransfer(Request $request)
    {

        $airport = $request->airport;
        $hotel = $request->hotel;
        $numberPeople = $request->numberPeople;
        $route = $request->route;
        $date = $request->date;
        $hour = $request->hour;

        $airport_id = Airport::where('name',$airport)->value('id');
        $hotel_id = Hotel::where('name',$hotel)->value('id');


        $resultTransfer = Transfer::whereHas('transfer_car', function ($query) use ($numberPeople){
            $query->where('capacity', '>', $numberPeople);
        })->where([
                    ['start_date', $date],
                    ['start_hour','>',$hour],
                    ['route', $route],
                    ['hotel_id',$hotel_id],
                    ['airport_id',$airport_id],
        ])->get();

        if ($resultTransfer->isEmpty())
        {
            return "No result matched your search";
        }
        else {
            return $resultTransfer;
        }
    }
}
