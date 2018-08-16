<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfer;
use Illuminate\Support\Facades\DB;

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

    public function search(Request $request)
    {
        $airport = $request->airport;
        $hotel = $request->hotel;
        $numberPeople = $request->numberPeople;
        $date = $request->date;
        $hour = $request->hour;

        $airport_id = DB::table('cities')->where('name',$airport)->value('id');
        $hotel_id = DB:: table('hotels')->where('name',$hotel)->value('id');

        $resultTransfer = DB::table('transfer')->where([
            ['number_people', '>', $numberPeople],
            ['start_date', $date],
            ['start_hour', '>' ,$hour],
            ['hotel_id',$hotel_id],
            ['airport_id',$airport_id],
        ])->get();

        if ($resultTransfer == null)
        {
            return "No result match your search";

        }
        else {
            return $resultTransfer;
        }





    }
}
