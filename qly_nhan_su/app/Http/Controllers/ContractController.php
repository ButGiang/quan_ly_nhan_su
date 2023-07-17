<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\HopDongService;

use App\Models\hopdong;

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
                $result = hopdong::whereBetween('ngayki', [$from_day, $to_day])->get();
            }
            else {
                $result = hopdong::where('ngayki', '>=', $from_day)->get();
            }
        }
        elseif($to_day) {
            $result = hopdong::where('ngayki', '<=', $to_day)->get();
        }
        else {
            $result = $this->hopdongService->getDSHD();
        }

        return view('Contract.list', [
            'title' => 'Danh sách hợp đồng',
            'contracts' => $result
        ]);
    }
}
