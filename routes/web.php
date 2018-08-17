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
Route::resource('hotels', 'HotelController');
Route::get('/hotels/create', function ()
{
   return view('despevago.createHotel');
});

Route::resource('/activities','ActivityController');
Route::resource('/airline', 'AirlineController');
Route::resource('/airline-contact', 'AirlineContactController');
Route::resource('/branch_office_contacts', 'BranchOfficeContactController');
Route::resource('/branch_offices', 'BranchOfficeController');
Route::resource('/car_flight_packages', 'CarFlightPackageController');
Route::resource('/car_options', 'CarOptionController');
Route::resource('/cars', 'CarController');
Route::resource('/cities', 'CityController');
Route::resource('/class-type', 'ClassTypeController');
Route::resource('/companies', 'CompanyController');
Route::resource('/countries', 'CountryController');
Route::resource('/hotel_contacts', 'HotelContactController');
Route::resource('/passenger', 'PassengerController');
Route::resource('/reservations','ReservationController');
Route::resource('/room', 'RoomController');
Route::resource('/room_flight_packages','RoomFlightPackageController');
Route::resource('/seats', 'SeatController');
Route::resource('/transfer_cars', 'TransferCarController');
Route::resource('/transfers', 'TransferController');
Route::resource('/user_histories', 'UserHistoryController');
Route::resource('/user_types','UserTypeController');
Route::resource('/users','UserController');


Route::get('/room/byHotel/{hotel_id}', 'RoomController@searchRoomsByHotel')->name('roomsByHotel');

Route::post('/reservation/room', 'ReservationController@roomReservation')->name('roomReservation');
Route::get('/user/reservations/{user_id}', 'ReservationController@userReservations')->name('userReservations');
Route::post('/reservations/finish', "ReservationController@finishReservation")->name('finishReservations');

Route::get('/hotels/byCity/{city_id}', "HotelController@searchHotelByCity")->name('hotelsByCity');
Route::get('/branch_offices/byCity/{city_id}', 'BranchOfficeController@searchBranchOfficeByCity')->name('branchOfficesByCity');
