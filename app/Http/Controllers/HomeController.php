<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function historical()
    {
        return view('dashboard.historical');
    }

    public function recorded()
    {
        return view('dashboard.recorded');
    }
}
