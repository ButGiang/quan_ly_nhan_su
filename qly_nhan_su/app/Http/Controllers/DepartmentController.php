<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\PhongBanService;
use App\Models\phongban;

class DepartmentController extends Controller
{
    protected $phongbanService;

    public function __construct(PhongBanService $phongbanService) {
        $this->phongbanService = $phongbanService;
    }

    public function index() {
        return view('Department.list', [
            'title' => 'Department list',
            'departments' => $this->phongbanService->getDSPB()
        ]);
    }

    public function create() {
        return view('Department.add', [
            'title' => 'Add Department',
            'departments' => $this->phongbanService->getDSPB()
        ]);
    }

    public function post_create(Request $request) {
        $this->phongbanService->create($request);
        return redirect()->back();
    }

    public function edit($id_phongban) {
        $department = phongban::where('id_phongban', $id_phongban)->first();
        return view('Department.edit', [
            'title' => 'edit Department: '. $department->ten,
            'department' => $department
        ]);
    }

    public function post_edit(Request $request, $id_phongban) {
        $department = phongban::where('id_phongban', $id_phongban)->first();
        $this->phongbanService->update($request, $department);
        return redirect('/department/list');
    }

    public function delete(Request $request) {
        $result = $this->phongbanService->delete($request);
        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!'
            ]);
            return location.reload();
        }
        return response()->json([
            'error' => true
        ]);
    }
}
