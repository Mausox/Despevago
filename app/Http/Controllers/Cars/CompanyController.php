<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\Company;
use Illuminate\Http\Request;
use App\Car;
use App\City;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('despevago.dashboard.company.index',['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $citiesName = array();

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }

        return view('despevago.dashboard.company.create', ["cities" => $citiesName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = (new Company)->fill($request->all());
        request()->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
        ]);
        Company::create($request->all());
        return redirect()->route('companies.show', [$company->id])->with('status',"The company ".$company->name." has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        $branch_offices = $company->branch_offices;
        return view('despevago.dashboard.company.view', ['company' => $company, 'branch_offices' => $branch_offices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $citiesName = array();

        $company = Company::find($id);

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }

        return view('despevago.dashboard.company.edit', ["cities" => $citiesName,"company" => $company]);
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
        $company = Company::find($id);
        $company->save();
        return redirect('/dashboard/companies/'.$company->id)->with('status', 'Company '.$company->name.', ID: '.$company->id.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        Company::destroy($id);

        return redirect('/dashboard/companies')->with('status', 'Company '.$company->name.', ID: '.$company->id.' has been deleted!');
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

    public function searchCompanyByCity($city_id)
    {
        $companies = Company::where('city_id', $city_id)->get();
        return $companies;
    }

}
