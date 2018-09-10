<?php

namespace App\Http\Controllers;

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

    public function searchCar()
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

}
