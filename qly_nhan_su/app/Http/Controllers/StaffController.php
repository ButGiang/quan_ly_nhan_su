<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\StaffService;

use App\Models\Staff;

class StaffController extends Controller
{
    protected $StaffService;

    public function __construct(StaffService $StaffService) {
        $this->StaffService = $StaffService;
    }

    public function index() {
        return view('Staff.list', [
            'title' => 'Staff list',
            'users' => $this->StaffService->getStaffList()
        ]);
    }

    public function create() {
        return view('Staff.add', [
            'title' => 'Add Staff',
            'majors' => $this->StaffService->getMajor()
        ]);
    }
}
