<?php

namespace App\Providers;

use App\Activity;
use App\Airline;
use App\Airport;
use App\Car;
use App\CarFlightPackage;
use App\Flight;
use App\Hotel;
use App\RoomFlightPackage;
use App\Transfer;
use App\UserHistory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;


class AppServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(Dispatcher $events)
    {

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add('Main');
            $countHotel =  Hotel::all()->count();
            $event->menu->add([
                'text'        => 'Hotels',
                'url'         => 'dashboard/hotels',
                'icon'        => 'hotel',
                'label'       =>  $countHotel,
                'label_color' => 'success',
            ]);

            $countCar =  Car::all()->count();
            $event->menu->add([
                'text'        => 'Cars',
                'url'         => 'dashboard/companies',
                'icon'        => 'car',
                'label'       =>  $countCar,
                'label_color' => 'success',
            ]);

            $countFlight = Flight::all()->count();
            $countAirport = Airport::all()->count();
            $countAirline = Airline::all()->count();

            $event->menu->add([
                'text'        => 'Air Flights',
                'icon'        => 'plane',
                'submenu' =>
                [
                    [
                        'text'        => 'Flights',
                        'url'         => 'dashboard/flight',
                        'label'       => $countFlight,
                        'label_color' => 'success',
                    ],
                    [
                        'text'        => 'Airports',
                        'url'         => 'dashboard/airport',
                        'label'       => $countAirport,
                        'label_color' => 'success',
                    ],
                    [
                        'text'        => 'Airlines',
                        'url'         => 'dashboard/airline',
                        'label'       => $countAirline,
                        'label_color' => 'success',
                    ]
                ]
            ]);

            $countCarFlightPackage= CarFlightPackage::all()->count();
            $countRoomFlightPackage = RoomFlightPackage::all()->count();

            $event->menu->add([
                'text'        => 'Tourist Packages',
                'icon'        => 'cubes',
                'submenu' =>[
                    [
                        'text'        => 'Package Flight - Car',
                        'url'         => 'dashboard/packages',
                        'label'       => $countCarFlightPackage,
                        'label_color' => 'success',
                    ],
                    [
                        'text'        => 'Package Flight - Hotel',
                        'url'         => 'dashboard/transfers',
                        'label'       => $countRoomFlightPackage,
                        'label_color' => 'success',
                    ]
                ]
            ]);

            $countTransfer = Transfer::all()->count();

            $event->menu->add([
                'text'        => 'Transfer',
                'url'         => 'dashboard/transfers',
                'icon'        => 'bus',
                'label'       => $countTransfer,
                'label_color' => 'success',
            ]);

            $countActivity = Activity::all()->count();
            $event->menu->add(
            [
                'text'        => 'Activities',
                'url'         => 'dashboard/activities',
                'icon'        => 'futbol-o',
                'label'       => $countActivity,
                'label_color' => 'success',
            ]);

            $countUserHistory = UserHistory::all()->count();
            $event->menu->add('Logs y más');
            $event->menu->add(
                [
                    'text'        => 'Logs Users',
                    'url'         => 'dashboard/users_histories',
                    'icon'        => 'file-text-o',
                    'label'       => $countUserHistory,
                    'label_color' => 'warning',
                ]);



        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
