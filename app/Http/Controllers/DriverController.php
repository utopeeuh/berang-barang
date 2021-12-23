<?php

namespace App\Http\Controllers;

use App\Models\Driver as DriverModel;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    //
    public function getRandomDriverID()
    {
        return DriverModel::inRandomOrder()->first()->id;
    }
}
