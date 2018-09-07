<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\BranchOfficeContact;
use App\City;
use App\UserHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BranchOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BranchOffice::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        $cities = City::all();
        $citiesName = array();
        
        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }

        return view('despevago.dashboard.company.branchOffice.create', ["company_id" => $company_id, "cities" => $citiesName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch_office = (new BranchOffice)->fill($request->all());
        $branch_office->company_id = $request->company_id;
        $branch_office->save();

        UserHistory::create(['action_type' => "Store",'action' => 'Stored the branch office with id: '.$branch_office->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect()->route('branch_offices.show', [$branch_office->id])->with('status',"The branch office ID: $branch_office->id has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch_office = BranchOffice::find($id);
        $cars = $branch_office->cars;
        return view('despevago.dashboard.company.branchOffice.view', ['branch_office' => $branch_office, 'cars' => $cars]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch_office = BranchOffice::find($id);

        $cities = City::all();
        $citiesName = array();
        
        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }
        
        return view('despevago.dashboard.company.branchOffice.edit',["company_id" => $branch_office->company_id, "branch_office" => $branch_office, "cities" => $citiesName]);
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
        $branch_office = BranchOffice::find($id)->fill($request->all());
    
        $branch_office->save();

        UserHistory::create(['action_type' => "Update",'action' => 'Updated the branch office with id: '.$branch_office->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect()->route('branch_offices.show', [$branch_office->id])->with('status',"The branch office ID: $branch_office->id has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch_office = BranchOffice::find($id);
        BranchOffice::destroy($id);
        UserHistory::create(['action_type' => "Destroy",'action' => 'Destroyed the branch office with id: '.$branch_office->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect('/dashboard/companies/'.$branch_office->company_id)->with('status', 'The branch office ID:'.$branch_office->id.' has been deleted!');
    }

    /**
     * allows the search of a branch-office and her contact given a city.. - GET Type
     *
     * @param  int  $city_id
     * @return array
     */

    public function searchBranchOfficeByCity(Request $request)
    {
        $pick_up_date = $request->pick_up_date;
        $return_date = $request->return_date;

        


        $city_id = $request->city_id;
        $branch_offices = BranchOffice::where('city_id',$city_id)->get();
        $data = array();
        foreach ($branch_offices as $branch_office)
        {
            $data[] = array
            (
                "branch_office" => $branch_office,
            );
        }
        return $data;
    }
}
