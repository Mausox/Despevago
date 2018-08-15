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

Route::resource('reservations','ReservationController');
Route::post('/reservation/room', 'ReservationController@roomReservation')->name('roomReservation');
Route::get('/user/reservations/{user_id}', 'ReservationController@userReservations')->name('userReservations');