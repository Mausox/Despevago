<?php

namespace App\Http\Controllers;

use App\BranchOffice;
use App\Car;
use App\UnavailableCar;
use DateTime;
use Illuminate\Http\Request;
use App\City;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function searchFlight()
    {
        $cities = City::all()->sortBy('name');
        $citiesName = collect([]);
        foreach ($cities as $city)
        {
            $citiesName = $citiesName->merge([$city->name => null]);
        }
        $yyyy = Carbon::now()->year;
        $mm = Carbon::now()->addMonths(-1)->month;
        $dd = Carbon::now()->day;
        return view('despevago.flights.search', compact('citiesName', 'yyyy', 'mm', 'dd'));
    }

    public function searchActivities()
    {
        $cities = City::all();
        $citiesName = array();

        foreach ($cities as  $city)
        {
            $citiesName[$city->id] = $city->name;
        }
        return view('despevago.activities.search', compact('citiesName'));
    }

    public function searchCarsForm()
    {
        /*$branch_office_all = BranchOffice::all();
        $branch_offices = $branch_office_all->pluck('address')->toArray();


        return view('despevago.cars.search', compact('branch_offices'));
        */

        $timeInterval = $this->hoursRange();
        $cities = City::all()->sortBy('name');
        $citiesName = collect([]);
        foreach ($cities as $city)
        {
            $citiesName = $citiesName->merge([$city->name => null]);
        }

        $yyyy = Carbon::now()->year;
        $mm = Carbon::now()->addMonths(-1)->month;
        $dd = Carbon::now()->day;
        return view('despevago.cars.search', compact('citiesName','yyyy','mm','dd','timeInterval'));
    }


    function hoursRange( $lower = 0, $upper = 86400, $step = 60*30, $format = '' ) {
        $times = array();

        if ( empty( $format ) ) {
            $format = 'g:i a';
        }

        foreach ( range( $lower, $upper, $step ) as $increment ) {
            $increment = gmdate( 'H:i', $increment );

            list( $hour, $minutes ) = explode( ':', $increment );

            $date = new DateTime( $hour . ':' . $minutes );

            $times[(string) $increment] = (string) $increment;
        }

        return $times;
    }

    public function searchCars(Request $request)
    {
        $branch_office_id = $request->branch_office_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $start_hour = ($request->start_hour);
        $end_hour = $request->end_hour;

        $pick_up_date = (new Carbon($start_date.$start_hour))->toDateTimeString();
        $return_date = (new Carbon($end_date.$end_hour))->toDateTimeString();
        $cars = Car::whereDoesntHave('unavailable_cars', function ($query) use ($pick_up_date, $return_date){
            $query->where('pick_up_date','>=',$pick_up_date)->where('return_date','<=',$return_date);
        })->where([
            ['branch_office_id', $branch_office_id]
        ])->get();

        $branch_office = BranchOffice::find($branch_office_id);

        $city = $branch_office->city;

        if ($cars->isEmpty())
        {
            return view('despevago.cars.companiesResult',
                compact('branch_offices','city','start_date','end_date','start_hour','end_hour'))
                ->with('status', "All the cars of this company has been used, please, try other");
        }

        return view('despevago.cars.carsResults',
            compact('cars','pick_up_date','city','return_date','branch_office','start_hour','start_date','end_hour','end_date'));


    }


}
