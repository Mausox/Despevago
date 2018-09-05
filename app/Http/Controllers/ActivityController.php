<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\City;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Activity::all();

        $activities = Activity::latest()->paginate(5);
        return view('despevago.activities.index', compact('activities'))->with('i', (request()->input('page', 1) -1) *5);
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
        $activity = Activity::create($request->all());
        return $activity;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Activity::find($id);

        $activity = Activity::find($id);
        $city_id = $activity->city_id;
        $city = City::find($city_id)->name;
        return view('despevago.activities.show', compact('activity', 'city'));
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
        Activity::find($id)->update($request->all());
        return "The activity ID: {$id} was updated!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::destroy($id);
        return "The activity ID: {$id} was removed!";
    }

    //Función que entrega las actividades de una ciudad en particular
    //Entradas: hotel_id
    //Tipo: GET
    public function searchActivitiesByCity(Request $request)
    {
        $city_id = $request->city_id;
        $activities = Activity::where("city_id",$city_id)->get();
        $city = City::find($city_id)->name;

        return view('despevago.activities.index', compact('activities', 'city'));
        
        //return $activity->all();
    }

    //Función que entrega las actividades de una fecha en particular
    //Entradas: date
    //Tipo: GET
    public function searchActivitiesByDate($date)
    {
        $activity = Activity::where("date",$date)->get();
        
        return $activity;
    }

    public function search()
    {
        //$cities_all = City::all();
        //$cities = $cities_all->pluck('name')->toArray();

        $cities = City::all();
        $citiesName = array();

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }
        return view('despevago.activities.search', compact('citiesName'));
    }
}
