<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use App\TransferCar;
use App\Airport;
use App\Hotel;
use App\City;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers = Transfer::all();
        return view('despevago.transfers.indexTransfer', ['transfers' => $transfers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::all();
        $hotelsName = array();

        foreach ($hotels as  $hotel)
        {
            $hotelsName[$hotel->id] = $hotel->name;
        }
        $airports = Airport::all();
        $airportsName = array();

        foreach ($airports as  $airport)
        {
            $airportsName[$airport->id] = $airport->name;
        }

        $transferCars = TransferCar::all();
        $transferCarsName = array();

        foreach ($transferCars as  $transferCar)
        {
            $transferCarsName[$transferCar->id] = $transferCar->vehicle_registration_number;
        }

        return view('despevago.transfers.createTransfer', ['hotels' => $hotelsName,  'airports' => $airportsName, 'transfer_cars' => $transferCarsName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'start_date' => 'required',
            'start_hour' => 'required|date_format:H:i',
            'route' => 'required',
            'price' => 'required|min:0',
            'hotel_id' => 'required',
            'airport_id' => 'required',
            'transfer_car_id' => 'required',
        ]);
        $request->number_people = 0;
        Transfer::create(array_merge($request->all(), ['number_people' => 0]));
        return redirect()->route('transfers.index')->with('success', 'Transfer has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transfer = Transfer::find($id);
        return view('despevago.transfers.showTransfer',['transfer' => $transfer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels = Hotel::all();
        $hotelsName = array();

        foreach ($hotels as  $hotel)
        {
            $hotelsName[$hotel->id] = $hotel->name;
        }
        $airports = Airport::all();
        $airportsName = array();

        foreach ($airports as  $airport)
        {
            $airportsName[$airport->id] = $airport->name;
        }

        $transferCars = TransferCar::all();
        $transferCarsName = array();

        foreach ($transferCars as  $transferCar)
        {
            $transferCarsName[$transferCar->id] = $transferCar->vehicle_registration_number;
        }

        $transfer = Transfer::find($id);
        return view('despevago.transfers.editTransfer', ['transfer' => $transfer, 'hotels' => $hotelsName,  'airports' => $airportsName, 'transfer_cars' => $transferCarsName]);
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
        return redirect()->route('transfers.index')->with('success', 'The transfer was updated');
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
        return redirect()->route('transfers.index')->with('success', 'The transfer was removed!');
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
        $airports = Airport::all();
        $airportsName = array();

        foreach ($airports as  $airport)
        {
            $airportsName[$airport->id] = $airport->name;
        }
        $hotels = Hotel::all();
        $hotelsName = array();

        foreach ($hotels as  $hotel)
        {
            $hotelsName[$hotel->id] = $hotel->name;
        }
        return view('despevago.transfers.searchTransfer', ['airports' => $airportsName, 'hotels' => $hotelsName]);
    }

    public function resultTransfer(Request $request)
    {

        $airport = Airport::find($request->airport_id);
        $hotel = Hotel::find($request->hotel_id);
        $numberPeople = $request->numberPeople;
        $route = $request->route;
        $date = $request->date;
        $hour = $request->hour;

        $resultTransfer = Transfer::whereHas('transfer_car', function ($query) use ($numberPeople){
            $query->where('capacity', '>', $numberPeople);
        })->where([
                    ['start_date', $date],
                    ['start_hour','>',$hour],
                    ['route', $route],
                    ['hotel_id',$hotel->id],
                    ['airport_id',$airport->id],
        ])->get();

        if (!$resultTransfer->isEmpty())
        {
            return view('despevago.transfers.resultTransfer', ['transfers' => $resultTransfer, 'numberPeople' =>  $numberPeople]);
        }
        else {
            return redirect('transfers/search')->with('status', 'There were no matches for your search!');
        }
    }
}
