<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\HopDongService;

use App\Models\hopdong;

class ContractController extends Controller
{
    public function index() {
        return view('Contract.list', [

        ]);
    }
}
