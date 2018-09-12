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
Route::get('/flights', 'SearchController@searchFlight');



Route::get('/', function()
{
    return view('welcome');
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin-home', 'HomeController@index')->middleware('AuthAdmin');


//<-------------------      Activities     --------------------->
Route::resource('/activity','ActivityController');
Route::get('/activities', 'SearchController@searchActivities')->name('activities');
Route::post('/activities/byCity', 'ActivityController@searchActivitiesByCity')->name('activitiesByCity');
Route::get('/activities/byDate/{date}', 'ActivityController@searchActivitiesByDate')->name('activitiesByDate');
//<-------------------      Activities     --------------------->



//<-------------------      Packages     --------------------->
Route::get('/packages', 'SearchController@searchPackages')->name('packages');
Route::get('/packages/car/byCity', 'PackageController@searchPackagesCarByCity')->name('packagesCarByCity');
Route::get('/packages/room/byCity', 'PackageController@searchPackagesRoomByCity')->name('packagesRoomByCity');
Route::resource('/car_flight_packages', 'CarFlightPackageController');

//<-------------------      Packages     --------------------->

Route::resource('/countries', 'CountryController');

//<-------------------         Hotel      --------------------->
Route::get('/hotels/search/rooms', "HotelController@searchHotelRoom")->name('searchHotelRoom');
Route::get('/hotels/search','HotelController@searchFormHotel')->name('searchFormHotel');
Route::get('/hotels/search_results', "HotelController@searchHotelByCity")->name('searchHotel');
Route::resource('dashboard/hotels', 'HotelController')->middleware('AuthAdmin');
Route::get('dashboard/hotels/byCity/{city_id}', "HotelController@searchHotelByCity")->name('hotelsByCity');
//<-------------------         Hotel      --------------------->

//<----------------------    Company    ----------------------->
Route::resource('dashboard/companies', 'CompanyController')->middleware('AuthAdmin');
Route::get('dashboard/companies/byCity/{city_id}', "CompanyController@searchCompanyByCity")->name('companiesByCity');
//<----------------------    Company    ----------------------->

//<-------------------         BranchOffice       --------------------->
Route::resource('/dashboard/companies/branch_offices', 'BranchOfficeController')->middleware('AuthAdmin');
Route::get('/dashboard/companies/{branch_offices_id}/branch_offices/create', 'BranchOfficeController@create')->middleware('AuthAdmin');
Route::get('/branch_office/byCompany/{company_id}', 'BranchOfficeController@searchBranchOfficeByCompany')->name('branchOfficesByCompany');
//<-------------------         BranchOffice       --------------------->

//<-------------------         Car       --------------------->
Route::resource('/dashboard/companies/branch_offices/cars', 'CarController')->middleware('AuthAdmin');
Route::get('/dashboard/companies/branch_offices/{branch_office_id}/cars/create', 'CarController@create')->middleware('AuthAdmin');
Route::get('/cars/byBranchOffices/{branch_office_id}', 'CarController@searchCarsByBranchOffice')->name('carsByBranchOffice');
//<-------------------         Room       --------------------->



Route::resource('/passenger', 'PassengerController');

//<-------------------         Room       --------------------->
Route::resource('/dashboard/hotels/rooms', 'RoomController')->middleware('AuthAdmin');
Route::get('/dashboard/hotels/{hotel_id}/rooms/create', 'RoomController@create')->middleware('AuthAdmin');
Route::get('/room/byHotel/{hotel_id}', 'RoomController@searchRoomsByHotel')->name('roomsByHotel');
//<-------------------         Room       --------------------->

Route::resource('/room_flight_packages','RoomFlightPackageController');
Route::resource('/seats', 'SeatController');
Route::resource('/user_types','UserTypeController');

//<-------------------         User       --------------------->
Route::get('user/profile', 'UserController@userProfile')->name('user.profile');
Route::get('user/shopping_cart', 'ReservationController@shoppingCart')->name('user.shopping_cart');
Route::delete('user/shopping_cart', 'ReservationController@removeReservation')->name('user.shopping_cart.destroy');
Route::get('user/history', 'UserHistoryController@userHistory')->name('user.history');
Route::post('user/shopping_cart', 'ReservationController@finishReservation')->name('user.finishReservation');
Route::resource('/user_histories', 'UserHistoryController');
Route::resource('/users','UserController');
Route::get('/user/reservations/{user_id}', 'UserController@userReservations')->name('userReservations');
//<-------------------         User       --------------------->

//<-------------------         User_History       --------------------->
Route::resource('/dashboard/users_histories','UserHistoryController')->middleware('AuthAdmin');
//<-------------------         User_History       --------------------->


Route::resource('/trips', 'TripController');

//<-------------------     Reservation    --------------------->
Route::post('/reservation/activity', 'ReservationController@activityReservation')->name('activityReservation');
Route::post('/reservation/room', 'ReservationController@roomReservation')->name('roomReservation');
Route::post('/reservation/transfer','ReservationController@transferReservation')->name('transferReservation');
Route::post('/reservation/car', 'ReservationController@carReservation')->name('carReservation');
Route::post('/reservation/seat', 'ReservationController@seatReservation')->name('seatReservation');
Route::post('/reservation/car_flight_package', 'ReservationController@carFlightPackageReservation')->name('carFlightPackageReservation');
Route::post('/reservation/room_flight_package', 'ReservationController@roomFlightPackageReservation')->name('roomFlightPackageReservation');
Route::post('/reservation/finish', "ReservationController@finishReservation")->name('finishReservations');
Route::resource('/reservations','ReservationController');


//Cars
Route::resource('/cars', 'CarController');
Route::get('/searchCar', 'CarController@search');
Route::resource('/car_options', 'CarOptionController');
Route::resource('/branch_offices', 'BranchOfficeController');
Route::resource('/companies', 'CompanyController');
Route::post('/searchCar/branch_offices/byCity', 'BranchOfficeController@searchBranchOfficeByCity')->name('branchOfficesByCity');
Route::get('/cars/byBranchOffice/{branch_office_id}', 'CarController@searchCarsByBranchOffice')->name('carsByBranchOffices');
Route::get('/cars/byCompany/{company_id}', 'CarController@searchCarsByCompany')->name('carsByCompany');
Route::get('/companies/byCar/{car_id}', 'CompanyController@searchCompanyByCar')->name('companyByCar');


// Transfers ------------------------->
// Transfer search by hotel and airport
Route::get('/transfers/search', 'TransferController@searchTransfer')->name('transfer.search');
Route::get('/transfers/result', 'TransferController@resultTransfer')->name('transfer.result');
// Transfer CRUD
Route::resource('/transfer_cars', 'TransferCarController');
Route::resource('/transfers', 'TransferController');

// Flights ------------------------------------------>
// -- Airline
Route::resource('/dashboard/airline', 'AirlineController')->middleware('AuthAdmin');
Route::get('/airline/by-flight/{flight_id}', 'AirlineController@searchAirlineByFlight');


// -- Airport
Route::resource('/dashboard/airport', 'AirportController')->middleware('AuthAdmin');
Route::get('/airports/by-city/{city_id}', 'AirportController@searchAirportsByCity');
Route::get('/airport/by-flight/{flight_id}', 'AirportController@searchAirportByFlight');
Route::get('/airport/by-transfer/{transfer_id}', 'AirportController@searchAirportByTransfer');
Route::get('/airport/departure/by-journey/{journey_id}', 'AirportController@searchDepartureAirportByJourney');
Route::get('/airport/arrival/by-journey/{journey_id}', 'AirportController@searchArrivalAirportByJourney');
Route::get('/airports/by-journey/{journey_id}', 'AirportController@searchAirportsByJourney');

// -- ClassType
Route::resource('/class-type', 'ClassTypeController');
Route::get('/class-type/by-seat/{seat_id}', 'ClassTypeController@searchClassTypeBySeat');

// -- Flight
Route::resource('/dashboard/flight', 'FlightController')->middleware('AuthAdmin');
Route::get('/flight/by-seat/{seat_id}', 'FlightController@searchFlightBySeat');
Route::get('/flights/by-airline/{airline_id}', 'FlightController@searchFlightsByAirline');
Route::get('/flights/by-airport/{airport_id}', 'FlightController@searchFlightsByAirport');
Route::get('/flight/by-journey/{journey_id}', 'FlightController@searchFlightByJourney');

// -- Journey
Route::resource('/journey', 'JourneyController');
Route::get('/journeys/departure/by-airport/{airport_id}', 'JourneyController@searchDepartureJourneysByAirport');
Route::get('/journeys/arrival/by-airport/{airport_id}', 'JourneyController@searchArrivalJourneysByAirport');
Route::get('/journeys/by-airport/{airport_id}', 'JourneyController@searchJourneysByAirport');
Route::get('/journeys/by-flight/{flight_id}', 'JourneyController@searchJourneysByFlight');

// -- Passenger
Route::resource('/passenger', 'PassengerController');
Route::get('/passenger/by-seat/{seat_id}', 'PassengerController@searchSeatByPassenger');

// -- Seat
Route::resource('dashboard/flight/seat', 'SeatController')->middleware('AuthAdmin');
Route::get('/dashboard/flight/{flight_id}/seat/create', 'SeatController@create')->middleware('AuthAdmin');

Route::get('/seat/by-passenger/{passenger_id}', 'SeatController@searchSeatByPassenger');
Route::get('/seats/by-flight/{flight_id}', 'SeatController@searchSeatsByFlight');
Route::get('/seats/by-class-type/{class_type_id}', 'SeatController@searchSeatsByClassType');

// -- City
Route::resource('/city', 'CityController');
Route::get('/city/by-airport/{airport_id}', 'CityController@searchCityByAirport');

// -- Trasnfer
Route::get('/transfers/by-airport/{airport_id}', 'TransferController@searchTransfersByAirport');

Route::get('/dashboard', 'DashboardController@dashboard')->name('adminDashboard')->middleware('AuthAdmin');



Route::resource('payment_methods', 'PaymentMethodController');
Route::get('payment', 'PaymentMethodController@paymentForm')->name('paymentForm');
Route::post('payment', 'PaymentMethodController@paymentAdd')->name('paymentAdd');