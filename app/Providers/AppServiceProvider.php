<?php

namespace App\Providers;

use App\Activity;
use App\CarFlightPackage;
use App\Flight;
use App\Hotel;
use App\RoomFlightPackage;
use App\Transfer;
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

            $event->menu->add('Navegador principal');
            $countHotel =  Hotel::all()->count();
            $event->menu->add([
                'text'        => 'Hoteles',
                'url'         => 'dashboard/hotels',
                'icon'        => 'hotel',
                'label'       =>  $countHotel,
                'label_color' => 'success',
            ]);


            $countFlight = Flight::all()->count();
            $event->menu->add([
                'text'        => 'Vuelos',
                'url'         => 'dashboard/flies',
                'icon'        => 'plane',
                'label'       => $countFlight,
                'label_color' => 'success',
            ]);

            $countCarFlightPackage= CarFlightPackage::all()->count();
            $countRoomFlightPackage = RoomFlightPackage::all()->count();

            $event->menu->add([
                'text'        => 'Paquetes Turísticos',
                'url'         => 'dashboard/packages',
                'icon'        => 'cubes',
                'submenu' =>[
                    [
                        'text'        => 'Paquetes Vuelo - Auto',
                        'url'         => 'dashboard/packages',
                        'label'       => $countCarFlightPackage,
                        'label_color' => 'success',
                    ],
                    [
                        'text'        => 'Paquetes Vuelo - Hotel',
                        'url'         => 'dashboard/transfers',
                        'label'       => $countRoomFlightPackage,
                        'label_color' => 'success',
                    ]
                ]
            ]);

            $countTransfer = Transfer::all()->count();

            $event->menu->add([
                'text'        => 'Traslados',
                'url'         => 'dashboard/transfers',
                'icon'        => 'bus',
                'label'       => $countTransfer,
                'label_color' => 'success',
            ]);

            $countActivity = Activity::all()->count();
            $event->menu->add(
            [
                'text'        => 'Actividades',
                'url'         => 'dashboard/activities',
                'icon'        => 'futbol-o',
                'label'       => $countActivity,
                'label_color' => 'success',
            ]);

            $event->menu->add('Logs y más');
            $event->menu->add(
                [
                    'text'        => 'Logs usuarios',
                    'url'         => 'dashboard/user_histories',
                    'icon'        => 'file-text-o',
                    'label'       => $countActivity,
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
