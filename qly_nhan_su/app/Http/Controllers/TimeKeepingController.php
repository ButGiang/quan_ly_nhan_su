<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeKeepingController extends Controller
{
    public function index() {
        return view('TimeKeeping', [
            'title' => 'Chấm công'
        ]);
    }
}
