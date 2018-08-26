<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\Car;
use Illuminate\Http\Request;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Car::all();
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
        $car = Car::create($request->all());
        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Car::find($id);
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
        Car::find($id)->update($request->all());
        return "The car ID:{$id} was updated!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);
        return "The car ID:{$id} was removed!";
    }

    /**
     * Search the company's car.
     *
     * @param  int  $company_id
     * @return array
     */

    public function searchCarsByCompany($company_id)
    {

        $branchs = BranchOffice::where("company_id",$company_id)->get();

        $data = array();

        foreach ($branchs as $branch)
        {
            $cars = Car::where('branch_office_id', $branch->id)->get();
            $data[] = array
            (
                "company" => $company_id,
                "cars" => $cars
            );
        }

        return $data;
    }

    /**
     * Search the branch's car.
     *
     * @param  int  $branch_office_id
     * @return \Illuminate\Http\Response
     */

    public function searchCarsByBranchOffice($branch_office_id)
    {
        $cars = Car::where("branch_office_id", $branch_office_id)->get();
        return $cars;
    }



}
