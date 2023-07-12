<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

use App\Models\nhanvien;
use App\Models\phongban;
use App\Models\chuyennganh;
use App\Models\trinhdo;

class NhanVienService {
    // gọi vào func staff trong Model Staff
    public function getDSNV() {
        return nhanvien::where('active', 1)->with('department')->with('major')->with('level')->orderBy('id', 'asc')->paginate(10);
    }

    public function getNhanVien($id) {
        return nhanvien::where('id', $id)->first();
    }

    public function getPhongBan($id_phongban) {
        return phongban::where('id_phongban', $id_phongban)->value('ten');
    }

    public function getChuyenNganh($id_chuyennganh) {
        return chuyennganh::where('id_chuyennganh', $id_chuyennganh)->value('ten');
    }

    public function getTrinhDo($id_trinhdo) {
        return trinhdo::where('id_trinhdo', $id_trinhdo)->value('ten');
    }

    public function create($request) {
        try {
            nhanvien::create([
                'ho' => (string) $request->input('first_name'), 
                'ten' => (string) $request->input('last_name'),
                'ngaysinh' => $request->input('birthday'),
                'email' => (string) $request->input('email'),
                'CCCD' => (string) $request->input('CCCD'),
                'diachi' => (string) $request->input('address'),
                'sdt' => (string) $request->input('phone'),
                'id_phongban' => $request->input('department'),
                'id_chuyennganh' => (string) $request->input('major'),
                'id_trinhdo' => (string) $request->input('level'),
                'active' => $request->input('active')
            ]);
            $request->session()->flash('success', 'Tạo nhân viên mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function delete($id) {
        $nhanvien = nhanvien::getNhanVien($id);
        if($nhanvien) {
            return nhanvien::where('id', $id)->delete();
        }
        return false;
    }
}