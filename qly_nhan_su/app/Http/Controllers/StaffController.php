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
        $departments = phongban::orderBy('id_phongban', 'asc')->get();
        $majors = chuyennganh::orderBy('id_chuyennganh', 'asc')->get();
        $levels = trinhdo::orderBy('id_trinhdo', 'asc')->get();

        return view('Staff.list', [
            'title' => 'Staff list',
            'staffs' => $this->nhanvienService->getDSNV(),
            'departments' => $departments,
            'majors' => $majors,
            'levels' => $levels
        ]);
    }

    public function create() {
        $departments = phongban::orderBy('id_phongban', 'asc')->get();
        $majors = chuyennganh::orderBy('id_chuyennganh', 'asc')->get();
        $levels = trinhdo::orderBy('id_trinhdo', 'asc')->get();

        return view('Staff.add', [
            'title' => 'add Staff',
            'departments' => $departments,
            'majors' => $majors,
            'levels' => $levels
        ]);
    }

    public function post_create(StaffFormRequest $request) {
        $this->nhanvienService->create($request);

        return redirect()->back()->withInput();
    }

    public function edit(nhanvien $id) {
        $departments = phongban::orderBy('id_phongban', 'asc')->get();
        $majors = chuyennganh::orderBy('id_chuyennganh', 'asc')->get();
        $levels = trinhdo::orderBy('id_trinhdo', 'asc')->get();

        return view('Staff.edit', [
            'title' => 'edit Staff: '. $id->ho. ' '. $id->ten,
            'staff' => $id,
            'departments' => $departments,
            'majors' => $majors,
            'levels' => $levels
        ]);
    }

    public function post_edit(Request $request, nhanvien $id) {
        $this->nhanvienService->update($request, $id);
        return redirect('/staff/list');
    }

    public function delete(Request $request) {
        $result = $this->nhanvienService->delete($request);

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

    public function search(Request $request) {
        $departments = phongban::orderBy('id_phongban', 'asc')->get();
        $majors = chuyennganh::orderBy('id_chuyennganh', 'asc')->get();
        $levels = trinhdo::orderBy('id_trinhdo', 'asc')->get();

        $search_name = $request->search_name;
        $search_department = $request->department;
        $search_major = $request->major;
        $search_level = $request->level;

        if($search_name) {
            if($search_department) {
                if($search_major) {
                    if($search_level) {
                        $result = nhanvien::where('ho', 'like', '%'. $search_name. '%')->orWhere('ten', 'like', '%'. $search_name. '%')
                            ->Where('id_phongban', $search_department)
                            ->Where('id_chuyennganh', $search_major)
                            ->Where('id_trinhdo', $search_level)
                            ->get();
                    }
                    else {
                        $result = nhanvien::where('ho', 'like', '%'. $search_name. '%')->orWhere('ten', 'like', '%'. $search_name. '%')
                        ->Where('id_phongban', $search_department)
                        ->Where('id_chuyennganh', $search_major)
                        ->get();
                    }
                }
                elseif($search_level) {
                    $result = nhanvien::where('ho', 'like', '%'. $search_name. '%')->orWhere('ten', 'like', '%'. $search_name. '%')
                            ->Where('id_phongban', $search_department)
                            ->Where('id_trinhdo', $search_level)
                            ->get();
                }
                else {
                    $result = nhanvien::where('ho', 'like', '%'. $search_name. '%')->orWhere('ten', 'like', '%'. $search_name. '%')
                        ->Where('id_phongban', $search_department)
                        ->get();
                }
            }
            elseif($search_major) {
                if($search_level) {
                    $result = nhanvien::where('ho', 'like', '%'. $search_name. '%')->orWhere('ten', 'like', '%'. $search_name. '%')
                            ->Where('id_chuyennganh', $search_major)
                            ->Where('id_trinhdo', $search_level)
                            ->get();
                }
                else {
                    $result = nhanvien::where('ho', 'like', '%'. $search_name. '%')->orWhere('ten', 'like', '%'. $search_name. '%')
                    ->Where('id_chuyennganh', $search_major)
                    ->get();
                }
            }
            elseif($search_level) {
                $result = nhanvien::where('ho', 'like', '%'. $search_name. '%')->orWhere('ten', 'like', '%'. $search_name. '%')
                            ->Where('id_trinhdo', $search_level)
                            ->get();
            }
            else {
                $result = nhanvien::where('ho', 'like', '%'. $search_name. '%')->orWhere('ten', 'like', '%'. $search_name. '%')->get();
            }
        }

        elseif($search_department) {
            if($search_major) {
                if($search_level) {
                    $result = nhanvien::Where('id_phongban', $search_department)
                        ->Where('id_chuyennganh', $search_major)
                        ->Where('id_trinhdo', $search_level)
                        ->get();
                }
                else {
                    $result = nhanvien::Where('id_phongban', $search_department)
                    ->Where('id_chuyennganh', $search_major)
                    ->get();
                }
            }
            elseif($search_level) {
                $result = nhanvien::Where('id_phongban', $search_department)
                        ->Where('id_trinhdo', $search_level)
                        ->get();
            }
            else {
                $result = nhanvien::Where('id_phongban', $search_department)->get();
            }
        }

        elseif($search_major) {
            if($search_level) {
                $result = nhanvien::Where('id_chuyennganh', $search_major)
                    ->Where('id_trinhdo', $search_level)
                    ->get();
            }
            else {
                $result = nhanvien::where('id_chuyennganh', $search_major)
                ->get();
            }
        }

        elseif($search_level) {
            $result = nhanvien::Where('id_trinhdo', $search_level)
            ->get();
        }

        else {
            $result = nhanvien::where('id', -1)->get();
        }

        return view('Staff.list', [
            'title' => 'Staff list',
            'staffs' => $result,
            'departments' => $departments,
            'majors' => $majors,
            'levels' => $levels
        ]);
    }
}
