<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\HopDongService;

use App\Models\hopdong;
use App\Models\nhanvien;

class ContractController extends Controller
{
    protected $hopdongService;

    public function __construct(HopDongService $hopdongService) {
        $this->hopdongService = $hopdongService;
    }

    public function index() {
        return view('Contract.list', [
            'title' => 'Danh sách hợp đồng',
            'contracts' => $this->hopdongService->getDSHD()
        ]);
    }

    public function search(Request $request) {
        $from_day = $request->from_day;
        $to_day = $request->to_day;

        if($from_day) {
            if($to_day) {
                $result = hopdong::where('ngaybatdau', '>=', $from_day)->where('ngayketthuc', '<=', $to_day)->get();
            }
            else {
                $result = hopdong::where('ngaybatdau', '>=', $from_day)->get();
            }
        }
        elseif($to_day) {
            $result = hopdong::where('ngayketthuc', '<=', $to_day)->get();

        }
        else {
            $result = hopdong::where('id_hopdong', -1)->get();
        }

        return view('Contract.list', [
            'title' => 'Danh sách hợp đồng',
            'contracts' => $result
        ]);
    }

    public function create() {
        $staffs = nhanvien::whereNotIn('id', hopdong::select('id'))->get();
        $date = date('Y-m-d');

        return view('Contract.add', [
            'title' => 'Add Contract',
            'staffs' => $staffs,
            'date' => $date
        ]);
    }

    public function post_create(Request $request) {
        $this->hopdongService->create($request);

        return redirect()->back()->withInput();
    }

    public function edit(hopdong $id_hopdong) {
        $staffs = nhanvien::whereNotIn('id', hopdong::select('id'))->get();
        return view('Contract.edit', [
            'title' => 'Edit Contract',
            'contract' => $id_hopdong,
            'staffs' => $staffs
        ]);
    }

    public function post_edit(Request $request, hopdong $id_hopdong) {
        $this->hopdongService->update($request, $id_hopdong);
        
        return redirect('/contract/list');
    }

    public function delete(Request $request) {
        $result = $this->hopdongService->delete($request);

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
