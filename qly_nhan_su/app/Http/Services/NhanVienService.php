<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

use App\Models\nhanvien;
use App\Models\phongban;
use App\Models\chuyennganh;
use App\Models\trinhdo;
use App\Models\taikhoannganhang;

class NhanVienService {
    // gọi vào func staff trong Model Staff
    public function getDSNV() {
        return nhanvien::with('department')->with('major')->with('level')->orderBy('id', 'asc')->paginate(10);
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
                'gioitinh' => (string) $request->input('gender'),
                'ngaysinh' => $request->input('birthday'),
                'email' => (string) $request->input('email'),
                'CCCD' => (string) $request->input('CCCD'),
                'diachi' => (string) $request->input('address'),
                'sdt' => (string) $request->input('phone'),
                'id_phongban' => $request->input('department'),
                'id_chuyennganh' => (string) $request->input('major'),
                'id_trinhdo' => (string) $request->input('level'),
                'active' => '1'
            ]);
            $request->session()->flash('success', 'Tạo nhân viên mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function edit_profile($request, $nhanvien) {
        $nhanvien->ho = (string) $request->input('first_name');
        $nhanvien->ten = (string) $request->input('last_name');
        $nhanvien->ngaysinh = $request->input('birthday');
        $nhanvien->email = (string) $request->input('email');
        $nhanvien->CCCD = (string) $request->input('CCCD');
        $nhanvien->diachi = (string) $request->input('address');
        $nhanvien->sdt = (string) $request->input('phone');
        $nhanvien->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function update($request, $staff): bool {
        $staff->ho = (string) $request->input('first_name');
        $staff->ten = (string) $request->input('last_name');
        $staff->gioitinh = (string) $request->input('gender');
        $staff->ngaysinh = $request->input('birthday');
        $staff->email = (string) $request->input('email');
        $staff->CCCD = (string) $request->input('CCCD');
        $staff->diachi = (string) $request->input('address');
        $staff->sdt = (string) $request->input('phone');
        $staff->active = (string) $request->input('active');
        $staff->id_phongban = (string) $request->input('department');
        $staff->id_chuyennganh = (string) $request->input('major');
        $staff->id_trinhdo = (string) $request->input('level');
        $staff->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function delete($request) {
        $nhanvien = nhanvien::where('id', (int) $request->input('id'))->first();
        if($nhanvien) {
            $nhanvien->delete();
            return true;
        }
        return false;
    }

    public function bank_create($request) {
        try {
            taikhoannganhang::create([
                'tennganhang' => (string) $request->input('bank_name'),
                'sotaikhoan' => (int) $request->input('stk'),
                'id' => (int) $request->input('staff'),
            ]);
            $request->session()->flash('success', 'Tạo mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function bank_update($request, $id_tknh): bool {
        $id_tknh->tennganhang = (string) $request->input('bank_name');
        $id_tknh->sotaikhoan = (int) $request->input('stk');
        $id_tknh->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function bank_delete($request) {
        $TKNH = taikhoannganhang::where('id_tknh', (int) $request->input('id'))->first();
        if($TKNH) {
            $TKNH->delete();
            return true;
        }
        return false;
    }
}