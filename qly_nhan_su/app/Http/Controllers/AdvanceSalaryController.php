<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UngLuongService;

use App\Models\ungluong;
use App\Models\nhanvien;

class AdvanceSalaryController extends Controller
{
    protected $ungluongService;

    public function __construct(UngLuongService $ungluongService) {
        $this->ungluongService = $ungluongService;
    }

    public function index() {
        return view('AdvanceSalary.list', [
            'title' => 'Danh sách ứng lương',
            'advSalarys' => $this->ungluongService->getDSUL()
        ]);
    }

    public function search(Request $request) {
        $name = $request->search_name;
        $status = $request->search_status;

        if($name) {
            if($status) {
                $id = nhanvien::select('id')->where('ho', 'like', '%'. $name. '%')->orWhere('ten', 'like', '%'. $name. '%')->get();
                $result = ungluong::whereIn('id', $id)->where('trangthai', $status)->get();
            }
            else {
                $id = nhanvien::select('id')->where('ho', 'like', '%'. $name. '%')->orWhere('ten', 'like', '%'. $name. '%')->get();
                $result = ungluong::whereIn('id', $id)->get();
            }
        }
        elseif(!is_null($status)) {
            $result = ungluong::where('trangthai', $status)->get();
        }
        else {
            $result = ungluong::where('id_ungluong', -1)->get();
        }

        return view('AdvanceSalary.list', [
            'title' => 'Danh sách ứng lương',
            'advSalarys' => $result
        ]);
    }

    public function create() {
        $staffs = nhanvien::orderBy('id', 'asc')->get();
        $date = date('Y-m-d');
        return view('AdvanceSalary.add', [
            'title' => 'Tạo yêu cầu ứng lương',
            'staffs' => $staffs,
            'date' => $date
        ]);
    }

    public function post_create(Request $request) {
        $this->ungluongService->create($request);

        return redirect('/advanceSalary/list');
    }

    public function edit(ungluong $id_ungluong) {
        return view('AdvanceSalary.edit', [
            'title' => 'Chi tiết ứng lương',
            'advSalary' => $id_ungluong
        ]);
    }

    public function post_edit(Request $request, ungluong $id_ungluong) {
        $this->ungluongService->update($request, $id_ungluong);
        
        return redirect('/advanceSalary/list');
    }
}
