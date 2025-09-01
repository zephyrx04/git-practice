<?php

namespace App\Http\Controllers\Reservations;

use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    public function index()
    {
        return view('modules.reservations.index');
    }
}
