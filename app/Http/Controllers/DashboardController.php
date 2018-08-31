<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $countReservations = Reservation::all()->count();
        $countUsers = User::all()->count();
        return view('despevago.dashboard.main',['countReservations' => $countReservations, 'countUsers' => $countUsers]);
    }
}
