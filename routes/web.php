<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin-home', 'HomeController@index')->middleware('AuthAdmin');


Route::get('/hotels/create', function ()
{
   return view('despevago.createHotel');
});

//<-------------------      Activities     --------------------->
Route::resource('/activities','ActivityController');
Route::get('/activities/byCity/{city_id}', 'ActivityController@searchActivitiesByCity')->name('activitiesByCity');
Route::get('/activities/byDate/{date}', 'ActivityController@searchActivitiesByDate')->name('activitiesByDate');
//<-------------------      Activities     --------------------->

//<-------------------       Airline       --------------------->
Route::resource('/airline', 'AirlineController');
//<-------------------       Airline       --------------------->

//<-------------------   Airline Contact   --------------------->
Route::resource('/airline-contact', 'AirlineContactController');
//<-------------------   Airline Contact   --------------------->

Route::resource('/branch_office_contacts', 'BranchOfficeContactController');
Route::resource('/branch_offices', 'BranchOfficeController');
Route::resource('/car_flight_packages', 'CarFlightPackageController');
Route::resource('/car_options', 'CarOptionController');
Route::resource('/cars', 'CarController');
Route::resource('/cities', 'CityController');
Route::resource('/class-type', 'ClassTypeController');
Route::resource('/companies', 'CompanyController');
Route::resource('/countries', 'CountryController');

//<-------------------         Hotel      --------------------->
Route::resource('hotels', 'HotelController');
Route::get('/hotels/byCity/{city_id}', "HotelController@searchHotelByCity")->name('hotelsByCity');
//<-------------------         Hotel      --------------------->

Route::resource('/hotel_contacts', 'HotelContactController');
Route::resource('/passenger', 'PassengerController');
Route::resource('/reservations','ReservationController');

//<-------------------         Room       --------------------->
Route::resource('/room', 'RoomController');
Route::get('/room/byHotel/{hotel_id}', 'RoomController@searchRoomsByHotel')->name('roomsByHotel');
//<-------------------         Room       --------------------->

Route::resource('/room_flight_packages','RoomFlightPackageController');
Route::resource('/seats', 'SeatController');
Route::resource('/transfer_cars', 'TransferCarController');
Route::resource('/transfers', 'TransferController');
Route::resource('/user_histories', 'UserHistoryController');
Route::resource('/user_types','UserTypeController');

//<-------------------         User       --------------------->
Route::resource('/users','UserController');
Route::get('/user/reservations/{user_id}', 'UserController@userReservations')->name('userReservations');
//<-------------------         User       --------------------->

//<-------------------     Reservation    --------------------->
Route::post('/reservation/activity', 'ReservationController@activityReservation')->name('activityReservation');
Route::post('/reservation/room', 'ReservationController@roomReservation')->name('roomReservation');
Route::post('/reservations/finish', "ReservationController@finishReservation")->name('finishReservations');
//<-------------------     Reservation    --------------------->

Route::get('/hotels/byCity/{city_id}', "HotelController@searchHotelByCity")->name('hotelsByCity');
Route::get('/branch_offices/byCity/{city_id}', 'BranchOfficeController@searchBranchOfficeByCity')->name('branchOfficesByCity');

