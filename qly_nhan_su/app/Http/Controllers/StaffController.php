<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

use App\Http\Services\NhanVienService;
use App\Http\Requests\StaffFormRequest;

use App\Models\nhanvien;
use App\Models\phongban;
use App\Models\chuyennganh;
use App\Models\trinhdo;

class StaffController extends Controller
{
    protected $StaffService;

    public function __construct(NhanVienService $nhanvienService) {
        $this->nhanvienService = $nhanvienService;
    }

    public function index() {
        return view('Staff.list', [
            'title' => 'Staff list',
            'staffs' => $this->nhanvienService->getDSNV()
        ]);
    }

    public function create() {
        $departments = phongban::orderBy('id_phongban', 'asc')->get();
        $majors = chuyennganh::orderBy('id_chuyennganh', 'asc')->get();
        $levels = trinhdo::orderBy('id_trinhdo', 'asc')->get();

        return view('Staff.add', [
            'title' => 'Add Staff',
            'departments' => $departments,
            'majors' => $majors,
            'levels' => $levels
        ]);
    }

    public function post_create(StaffFormRequest $request) {
        $this->nhanvienService->create($request);

        return redirect()->back()->withInput();
    }

    public function delete(Request $request): JsonResponse {
        $result = $this->nhanvienService->delete($request);

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
