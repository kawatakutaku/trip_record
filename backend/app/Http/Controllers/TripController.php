<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index() {
        $trips = Trip::all();

        return view('trips/index', [
            'trips' => $trips,
        ]);
    }
}
