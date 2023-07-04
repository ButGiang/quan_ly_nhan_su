<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
        $user_name = Auth::user()->name;
        $avatar = Auth::user()->avatar;

        return view('layout', [
            'title' => 'MAIN LAYOUT',
            'user_name' => $user_name,
            'avatar' => $avatar
        ]);
    }
}
