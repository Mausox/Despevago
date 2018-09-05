<?php

namespace App\Http\Controllers;

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
}
