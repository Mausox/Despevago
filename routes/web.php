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


Route::resource('/airline_contact', 'AirlineContactController');
Route::resource('/car_flight_packages', 'CarFlightPackageController');
Route::resource('/class_types', 'ClassTypeController');
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
Route::resource('/trips', 'TripController');

//<-------------------     Reservation    --------------------->
Route::post('/reservation/activity', 'ReservationController@activityReservation')->name('activityReservation');
Route::post('/reservation/room', 'ReservationController@roomReservation')->name('roomReservation');
Route::post('/reservations/finish', "ReservationController@finishReservation")->name('finishReservations');
Route::post('/reservation/car', 'ReservationController@carReservation')->name('carReservation');
//<-------------------     Reservation    --------------------->

//Transfer
Route::get('/search_transfer', 'TransferController@searchTransfer')->name('searchTransfer');
Route::post('/reservations/transfer','ReservationController@transferReservation')->name('transferReservation');

Route::get('/hotels/byCity/{city_id}', "HotelController@searchHotelByCity")->name('hotelsByCity');

//Cars
Route::resource('/cars', 'CarController');
Route::resource('/car_options', 'CarOptionController');
Route::resource('/branch_offices', 'BranchOfficeController');
Route::resource('/branch_office_contacts', 'BranchOfficeContactController');
Route::resource('/companies', 'CompanyController');
Route::get('/branch_offices/byCity/{city_id}', 'BranchOfficeController@searchBranchOfficeByCity')->name('branchOfficesByCity');
Route::get('/cars/byBranchOffice/{branch_office_id}', 'CarController@searchCarsByBranchOffice')->name('carsByBranchOffices');

// Flights ------------------------->
// -- Airline
Route::resource('/airline', 'AirlineController');
// ---- Airline by AirlineContact
Route::get('/airline/by-airline-contact/{airline_contact_id}', 'AirlineController@searchAirlineByAirlineContact');

// -- AirlineContact
Route::resource('/airline-contact', 'AirlineContactController');
// ---- AirlineContact by Airline
Route::get('/airline-contacts/by-airline/{airline_id}', 'AirlineContactController@searchAirlineContactsByAirline');

// -- Airport
Route::resource('/airport', 'AirportController');
// ---- Airports by City
Route::get('/airports/by-city/{city_id}', 'AirportController@searchAirportsByCity');

// -- City
Route::resource('/city', 'CityController');
// ---- City by Airport
Route::get('/city/by-airport/{airport_id}', 'CityController@searchCityByAirport');
