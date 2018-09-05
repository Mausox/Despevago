<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\BranchOfficeContact;
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
        $branch_office = BranchOffice::create($request->all());
        return $branch_office;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BranchOffice::find($id);
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
        BranchOffice::find($id)->update($request->all());
        return "The branch office ID: {$id} was updated!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BranchOffice::destroy($id);
        return "The branch office ID: {$id} was removed!";
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
            $branch_office_contact = BranchOfficeContact::where('branch_office_id',$branch_office->id)->get();
            $data[] = array
            (
                "branch_office" => $branch_office,
                "branch_office_contact" => $branch_office_contact,
                "pick_up_date" => $pick_up_date,
                "return_date" => $return_date,
            );
        }
        return $data;
    }
}
