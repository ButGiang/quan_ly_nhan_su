<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Services\StaffService;
use App\Models\Staff;

class MainController extends Controller
{
    protected $StaffService;

    public function __construct(StaffService $StaffService) {
        $this->StaffService = $StaffService;
    }

    public function index() {
        $email = Auth::user()->email;
        $staff_data = $this->StaffService->getStaff($email);
        $name = $staff_data->first_name .' '. $staff_data->last_name;
        return view('main', [
            'title' => 'Dashboard',
            'name' => $name,
            'email' => $email,
            'phone' => $staff_data->phone,
            'major' => $staff_data->major,
            'desc' => $staff_data->description
        ]);
    }
}
