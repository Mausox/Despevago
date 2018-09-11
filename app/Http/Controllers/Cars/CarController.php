<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\Car;
use App\CarOption;
use App\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Auth;


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
    public function create($branch_office_id)
    {
        $car_options = CarOption::all();

        $car_options_name = array();

        foreach ($car_options as $car_option)
        {
            $car_options_name[$car_option->id] = $car_option->name;
        }
        return view('despevago.dashboard.company.branchOffice.car.create',["branch_office_id" => $branch_office_id, "car_options_name" => $car_options_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = (new Car)->fill($request->all());
        $car->branch_office_id = $request->branch_office_id;
        //$car->car_image = $request->file('car_image')->store('public/cars');
        $car->save();

        $car_new = Car::find($car->id);
        
        foreach ($request->car_options as $car_option)
        {
            $car_new->car_options()->attach($car_option);
        }
        UserHistory::create(['action_type' => "Store",'action' => 'Stored the car with id: '.$car->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect()->route('cars.show', [$car->id])->with('status',"The car ID: $car->id has been created!");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        $carOptions = $car->car_options;

        return view('despevago.dashboard.company.branchOffice.car.view', ['car' => $car, 'carOptions' => $carOptions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $car_options = CarOption::all();
        $car_options_name = array();

        foreach ($car_options as $car_option)
        {
            $car_options_name[$car_option->id] = $car_option->name;
        }

        $actual_car_options = $car->car_options;

        return view('despevago.dashboard.company.branchOffice.car.edit',["branch_office_id" => $car->branch_office_id, "car" => $car, "car_options_name" => $car_options_name, "actual_car_options" => $actual_car_options]);
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
        $car = Car::find($id)->fill($request->all());
        /*if ($request->file())
        {
            $car->car_image = $request->file('car_image')->store('public/cars');
        }*/

        $car->save();

        foreach ($request->car_options as $car_option)
        {
            $car->car_options()->detach($car_option);
        }

        foreach ($request->car_options as $car_option)
        {
            $car->car_options()->attach($car_option);
        }

        UserHistory::create(['action_type' => "Update",'action' => 'Updated the car with ID: '.$car->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect()->route('cars.show', [$car->id])->with('status',"The car ID: $car->id has been updated!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        Car::destroy($id);
        UserHistory::create(['action_type' => "Destroy",'action' => 'Destroyed the car with id: '.$car->id,'date' => Carbon::now(),'hour' => Carbon::now(),'user_id' => Auth::user()->id]);
        return redirect('/dashboard/companies/branch_offices/'.$car->branch_office_id)->with('status', 'The car ID:'.$car->id.' has been deleted!');
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
