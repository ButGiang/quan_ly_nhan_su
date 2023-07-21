<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Session;

use App\Models\thuong_phat;

class ThuongPhatService {
    public function create($request) {
        try {
            thuong_phat::create([
                'phanloai' => $request->input('phanloai'), 
                'ngay' => $request->input('day'),
                'noidung' => $request->input('content'),
                'trangthai' => '0',
                'id' => (int) $request->input('staff')
            ]);
            $request->session()->flash('success', 'Tạo mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $thuongphat) {
        $thuongphat->phanloai = $request->input('phanloai');
        $thuongphat->ngay = $request->input('day');
        $thuongphat->noidung = (string) $request->input('content');
        $thuongphat->trangthai = (string) $request->input('status');
        $thuongphat->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }
}