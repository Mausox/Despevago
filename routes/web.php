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
Route::get('/dashboard/admin', 'DashboardController@indexAdmin')->name('dashboardAdmin');
Route::get('/dashboard/consumer', 'DashboardController@indexConsumer')->name('dashboardConsumer');


Route::get('/admin-home', 'HomeController@index')->middleware('AuthAdmin');
