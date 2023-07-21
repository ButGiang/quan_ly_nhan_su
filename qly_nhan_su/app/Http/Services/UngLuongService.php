<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

use App\Models\ungluong;

class UngLuongService {
    public function getDSUL() {
        return ungluong::orderBy('id_ungluong', 'asc')->paginate(10);
    }

    public function create($request) {
        try {
            ungluong::create([
                'sotien' => (int) $request->input('money'), 
                'ngay' => $request->input('day'),
                'ghichu' => $request->input('content'),
                'id' => (int) $request->input('staff'),
                'trangthai' => '0'
            ]);
            $request->session()->flash('success', 'Tạo hợp đồng mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $ungluong) {
        $ungluong->sotien = (int) $request->input('money');
        $ungluong->ngay = $request->input('day');
        $ungluong->ghichu = (string) $request->input('content');
        $ungluong->trangthai = (int) $request->input('status');
        $ungluong->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }
}