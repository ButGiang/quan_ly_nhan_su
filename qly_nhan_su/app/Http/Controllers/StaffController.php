<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Http\Services\NhanVienService;
use App\Http\Services\UploadService;
use App\Http\Requests\StaffFormRequest;

use App\Models\nhanvien;
use App\Models\phongban;
use App\Models\chuyennganh;
use App\Models\trinhdo;
use App\Models\taikhoannganhang;
use App\Models\baohiem;
use App\Models\qtpt;
use App\Models\thanhtuu;


class StaffController extends Controller
{
    protected $nhanvienService, $uploadService;

    public function __construct(NhanVienService $nhanvienService, UploadService $uploadService) {
        $this->nhanvienService = $nhanvienService;
        $this->uploadService = $uploadService;
    }

    public function index() {
        $departments = phongban::orderBy('id_phongban', 'asc')->get();
        $majors = chuyennganh::orderBy('id_chuyennganh', 'asc')->get();
        $levels = trinhdo::orderBy('id_trinhdo', 'asc')->get();

        return view('Staff.list', [
            'title' => 'Danh sách nhân viên',
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
        $avatar = nhanvien::select('avatar')->get();

        return view('Staff.add', [
            'title' => 'Thêm nhân viên',
            'departments' => $departments,
            'majors' => $majors,
            'levels' => $levels,
            'avatar' => $avatar,
            'today' => Carbon::today()->format('Y-m-d')
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
            'title' => 'Chỉnh sủa thông tin NV: '. $id->ho. ' '. $id->ten,
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
            'title' => 'Danh sách tài khoản ngân hàng của NV',
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




    public function insurance_list() {
        return view('Staff.Insurance.insurance_list', [
            'title' => 'Danh sách bảo hiểm của NV',
            'insurances' => baohiem::orderBy('id_baohiem', 'asc')->get()
        ]);
    }

    public function insurance_add() {
        $staffs = nhanvien::whereNotIn('id', baohiem::select('id'))->get();
        
        return view('Staff.Insurance.insurance_add', [
            'title' => 'Thêm thông tin bảo hiểm của NV',
            'staffs' => $staffs
        ]);
    }

    public function post_insurance_add(Request $request) {
        $this->nhanvienService->insurance_create($request);

        return redirect('/staff/insurance');
    }

    public function insurance_edit(baohiem $id) {
        return view('Staff.Insurance.insurance_edit', [
            'title' => 'Chỉnh sủa thông tin bảo hiểm',
            'insurance' => $id
        ]);
    }

    public function post_insurance_edit(Request $request, baohiem $id) {
        $this->nhanvienService->insurance_update($request, $id);

        return redirect('/staff/insurance');
    }

    public function insurance_delete(Request $request) {
        $result = $this->nhanvienService->insurance_delete($request);

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

    public function insurance_search(Request $request) {
        $name = $request->input('search_name');
        
        if($name) {
            $id = nhanvien::select('id')->where('ho', 'like', '%'. $name. '%')->orWhere('ten', 'like', '%'. $name. '%')->get();
            $result = baohiem::whereIn('id', $id)->get();
        }
        else {
            $result = baohiem::where('id_baohiem', -1)->get();
        }

        return view('Staff.Insurance.insurance_list', [
            'title' => 'Danh sách bảo hiểm nhân viên',
            'insurances' => $result
        ]); 
    }



    
    public function grown_process_list() {
        return view('Staff.grown_process.list', [
            'title' => 'Quá trình phát triển của nhân viên',
            'grown_process' => qtpt::orderBy('id_qtpt', 'asc')->get()
        ]);
    }

    public function grown_process_add() {
        $staffs = nhanvien::whereNotIn('id', qtpt::select('id'))->get();

        return view('Staff.grown_process.add', [
            'title' => 'Khai báo quá trình phát triển của nhân viên',
            'staffs' => $staffs,
            'avatar' => qtpt::select('anhTDHV')->get()
        ]);
    }

    public function post_grown_process_add(Request $request) {
        $this->nhanvienService->grown_process_create($request);

        $qtpt = qtpt::where('id', qtpt::latest('id_qtpt')->value('id'))->first();

        $url = $this->uploadService->upload($request);
        if($url) {
            response()->json([
                'error' => false,
                'url' => $url
            ]);                       
            $qtpt->anhTDHV = $url;
            $qtpt->save();
        }
        else {
            response()->json(['error' => true]);
        }

        return redirect('/staff/grown_process');
    }

    public function grown_process_edit(qtpt $id) {
        return view('Staff.grown_process.edit', [
            'title' => 'Chỉnh sủa quá trình phát triển của nhân viên',
            'qtpt' => $id,
            'avatar' => $id->avatar
        ]);
    }

    public function post_grown_process_edit(Request $request, qtpt $id) {
        $this->nhanvienService->grown_process_update($request, $id);

        return redirect('/staff/grown_process');
    }

    public function grown_process_delete(Request $request) {
        $result = $this->nhanvienService->grown_process_delete($request);

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

    public function grown_process_search(Request $request) {
        $name = $request->input('search_name');
        
        if($name) {
            $id = nhanvien::select('id')->where('ho', 'like', '%'. $name. '%')->orWhere('ten', 'like', '%'. $name. '%')->get();
            $result = qtpt::whereIn('id', $id)->get();
        }
        else {
            $result = qtpt::where('id_qtpt', -1)->get();
        }

        return view('Staff.grown_process.list', [
            'title' => 'Quá trình phát triển của nhân viên',
            'grown_process' => $result
        ]); 
    }


    public function achievement_list() {
        return view('Staff.achievement.list', [
            'title' => 'Thành tựu đạt được của nhân viên',
            'achievement' => thanhtuu::orderBy('id_thanhtuu', 'asc')->get()
        ]);
    }

    public function achievement_add() {
        return view('Staff.achievement.add', [
            'title' => 'Khai báo thành tựu đạt được của nhân viên',
            'staffs' => nhanvien::orderBy('id', 'asc')->get(),
            'avatar' => thanhtuu::select('hinhanh')->get()
        ]);
    }

    public function post_achievement_add(Request $request) {
        $this->nhanvienService->achievement_create($request);

        return redirect('/staff/achievement');
    }

    public function achievement_edit(thanhtuu $id) {
        return view('Staff.achievement.edit', [
            'title' => 'Chỉnh sủa thành tựu đạt được của nhân viên',
            'achievement' => $id,
            'avatar' => $id->avatar
        ]);
    }

    public function post_achievement_edit(Request $request, thanhtuu $id) {
        $this->nhanvienService->achievement_update($request, $id);

        return redirect('/staff/achievement');
    }

    public function achievement_delete(Request $request) {
        $result = $this->nhanvienService->achievement_delete($request);

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

    public function achievement_search(Request $request) {
        $name = $request->input('search_name');
        
        if($name) {
            $id = nhanvien::select('id')->where('ho', 'like', '%'. $name. '%')->orWhere('ten', 'like', '%'. $name. '%')->get();
            $result = thanhtuu::whereIn('id', $id)->get();
        }
        else {
            $result = thanhtuu::where('id_thanhtuu', -1)->get();
        }

        return view('Staff.achievement.list', [
            'title' => 'Thành tựu đạt được của nhân viên',
            'achievement' => $result
        ]); 
    }
}
