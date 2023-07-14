<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Session;

use App\Models\phongban;

class PhongBanService {

    public function getDSPB() {
        return phongban::orderBy('id_phongban', 'asc')->paginate(10);
    }

    public function getPhongBan($id_phongban) {
        return phongban::where('id_phongban', $id_phongban)->value('ten');
    }

    public function create($request) {
        try {
            phongban::create([
                'ten' => (string) $request->input('name'), 
            ]);
            $request->session()->flash('success', 'Tạo Phòng Ban mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $department): bool {
        $department->ten = (string) $request->input('name');
        $department->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function delete($request) {
        $phongban = phongban::where('id_phongban', (int) $request->input('id'))->first();
        if($phongban) {
            $phongban->delete();
            return true;
        }
        return false;
    }
}