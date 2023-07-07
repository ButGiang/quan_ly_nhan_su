<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Services\StaffService;
use App\Http\Requests\FormInputRequest;
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

    public function post_create(FormInputRequest $request) {
        $this->StaffService->create($request);

        return redirect()->back();
    }

    public function delete(Request $request): JsonResponse {
        $result = $this->StaffService->delete($request);

        if($request) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
