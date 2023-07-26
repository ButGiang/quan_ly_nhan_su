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
use App\Models\taikhoannganhang;

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

        return redirect('/staff/list');
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

    public function bank_list() {
        return view('Staff.Bank.bank_list', [
            'title' => 'Danh sách tài khoản ngân hàng',
            'banks' => taikhoannganhang::orderBy('id_tknh', 'asc')->get()
        ]);
    }

    public function bank_add() {
        $staffs = nhanvien::whereNotIn('id', taikhoannganhang::select('id'))->get();
        
        return view('Staff.Bank.bank_add', [
            'title' => 'Thêm mới TKNH',
            'staffs' => $staffs
        ]);
    }

    public function post_bank_add(Request $request) {
        $this->nhanvienService->bank_create($request);

        return redirect('/staff/bank');
    }

    public function bank_edit(taikhoannganhang $id_tknh) {
        return view('Staff.Bank.bank_edit', [
            'title' => 'Chỉnh sủa TKNH',
            'bank' => $id_tknh
        ]);
    }

    public function post_bank_edit(Request $request, taikhoannganhang $id_tknh) {
        $this->nhanvienService->bank_update($request, $id_tknh);

        return redirect('/staff/bank');
    }

    public function bank_delete(Request $request) {
        $result = $this->nhanvienService->bank_delete($request);

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

    public function bank_search(Request $request) {
        $name = $request->input('search_name');
        
        if($name) {
            $id = nhanvien::select('id')->where('ho', 'like', '%'. $name. '%')->orWhere('ten', 'like', '%'. $name. '%')->get();
            $result = taikhoannganhang::whereIn('id', $id)->get();
        }
        else {
            $result = taikhoannganhang::where('id_tknh', -1)->get();
        }

        return view('Staff.Bank.bank_list', [
            'title' => 'Danh sách tài khoản ngân hàng',
            'banks' => $result
        ]); 
    }
}
