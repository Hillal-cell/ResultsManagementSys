<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Chart_01Controller extends Controller
{
    public function lineChart()
    {
        return view('line-chart');
    }
}
