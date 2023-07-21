<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Services\ThuongPhatService;
use App\Models\thuong_phat;
use App\Models\nhanvien;


class RewardPunishmentController extends Controller
{
    protected $thuongphatService;

    public function __construct(ThuongPhatService $thuongphatService) {
        $this->thuongphatService = $thuongphatService;
    }

    public function index() {
        $rewards = thuong_phat::where('phanloai', 1)->get();
        $punishments = thuong_phat::where('phanloai', 0)->get();
        return view('Reward_Punishment.list', [
            'title' => 'Reward & Punishment',
            'rewards' => $rewards,
            'punishments' => $punishments
        ]);
    }

    public function search(Request $request) {
        $name = $request->search_name;
        $status = $request->search_status;

        if($name) {
            if($status) {
                $id = nhanvien::select('id')->where('ho', 'like', '%'. $name. '%')->orWhere('ten', 'like', '%'. $name. '%')->get();
                $result_r = thuong_phat::where('id', $id->value('id'))->where('trangthai', $status)->where('phanloai', 1)->get();
                $result_p = thuong_phat::where('id', $id->value('id'))->where('trangthai', $status)->where('phanloai', 0)->get();
            }
            else {
                $id = nhanvien::select('id')->where('ho', 'like', '%'. $name. '%')->orWhere('ten', 'like', '%'. $name. '%')->get();
                $result_r = thuong_phat::where('id', $id->value('id'))->where('phanloai', 1)->get();
                $result_p = thuong_phat::where('id', $id->value('id'))->where('phanloai', 0)->get();
            }
        }
        elseif(!is_null($status)) {
            $result_r = thuong_phat::where('trangthai', $status)->where('phanloai', 1)->get();
            $result_p = thuong_phat::where('trangthai', $status)->where('phanloai', 0)->get();
        }
        else {
            $result_r = $result_p = thuong_phat::where('id_thuongphat', -1)->get();
        }

        return view('Reward_Punishment.list', [
            'title' => 'Danh sách ứng lương',
            'rewards' => $result_r,
            'punishments' => $result_p
        ]);
    }

    public function create() {
        $staffs = nhanvien::orderBy('id', 'asc')->get();
        $date = date('Y-m-d');
        return view('Reward_Punishment.add', [
            'title' => 'Add Reward OR Punishment',
            'staffs' => $staffs,
            'day' => $date
        ]);
    }

    public function post_create(Request $request) {
        $this->thuongphatService->create($request);
        
        return redirect('/extra/reward&punishment');
    }

    public function edit(thuong_phat $id_thuongphat) {
        $staffs = nhanvien::where('id', '<>',$id_thuongphat->id)->get();
        return view('Reward_Punishment.edit', [
            'title' => 'Edit',
            're_pu' => $id_thuongphat,
            'staffs' => $staffs
        ]);
    }

    public function post_edit(Request $request, thuong_phat $id_thuongphat) {
        $this->thuongphatService->update($request, $id_thuongphat);
        
        return redirect('/extra/reward&punishment');
    }

    public function delete(Request $request) {

    }

}
