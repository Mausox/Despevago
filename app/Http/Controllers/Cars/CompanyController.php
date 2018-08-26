<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\Company;
use Illuminate\Http\Request;
use App\Car;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::all();
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
        $company = Company::create($request->all());
        return $company;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Company::find($id);
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
        Company::find($id)->update($request->all());
        return "The company ID:{$id} was updated!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return "The company ID: {$id} was removed!";
    }


    /**
     * Find the company associated with a car.
     *
     * @param  int  $car_id
     * @return array
     */
    public function searchCompanyByCar($car_id)
    {

        $car = Car::where('id', $car_id)->get();
        $branch = BranchOffice::where('id', $car[0]["branch_office_id"])->get();


        //return "The car : '".$car_id."' belongs to the company: '".$branch[0]["company_id"]."'.";

        $company_id =  $branch[0]["company_id"];

        $company = Company::where('id', $company_id)->get();

        $data = array();

        $data[] = array
        (
            "Car" => $car_id,
            "Company" => $company
        );

        return $data;
    }

}
