<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\Car;
use App\City;
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
        //return Car::all();

        $cars = Car::latest()->paginate(5);
        return view('despevago.cars.index', compact('cars'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_office_all = BranchOffice::all();
        $branch_offices = $branch_office_all->pluck('address')->toArray();
        return view('despevago.cars.create', compact('branch_offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$car = Car::create($request->all());
        return $car;*/

        request()->validate([
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'capacity' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'branch_office_id' => 'required',
        ]);
        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Car::find($id);
        $car = Car::find($id);
        return view('despevago.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $branch_offices = BranchOffice::all()->pluck('address')->toArray();
        return view('despevago.cars.edit', compact('car','branch_offices'));
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
        /*Car::find($id)->update($request->all());
        return "The car ID:{$id} was updated!";*/
        request()->validate([
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'capacity' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'branch_office_id' => 'required',
        ]);
        Car::find($id)->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*Car::destroy($id);
        return "The car ID:{$id} was removed!";*/
        Car::find($id)->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
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

    public function search()
    {
        /*$branch_office_all = BranchOffice::all();
        $branch_offices = $branch_office_all->pluck('address')->toArray();


        return view('despevago.cars.search', compact('branch_offices'));
        */

        $cities = City::all();
        $citiesName = array();

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }
        return view('despevago.cars.search', compact('citiesName'));

          
    }

}
