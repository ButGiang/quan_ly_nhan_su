<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

use App\Models\congthucluong;
use App\Models\danhmucluong;
use App\Models\luongcodinh;
use App\Models\luongtheothang;

class LuongService {
    // Công thức lương
    public function formula_create($request) {
        try {
            congthucluong::create([
                'ten' => (string) $request->input('name'), 
                'congthuc' => (string) $request->input('formula'),
            ]);
            $request->session()->flash('success', 'Tạo mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function formula_update($request, $id_ctl) {
        $id_ctl->ten = (string) $request->input('name');
        $id_ctl->congthuc = (string) $request->input('formula');
        $id_ctl->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function formula_delete($request) {
        $ct_luong = congthucluong::where('id_ctl', (int) $request->input('id'))->first();
        if($ct_luong) {
            $ct_luong->delete();
            return true;
        }
        return false;
    }



    // danh mục lương
    public function category_create($request) {
        try {
            danhmucluong::create([
                'ten' => (string) $request->input('name'), 
                'kyhieu' => (string) $request->input('symbol'),
                'loailuong' => (int) $request->input('type')
            ]);
            $request->session()->flash('success', 'Tạo mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function category_update($request, $id_dml) {
        $id_dml->ten = (string) $request->input('name');
        $id_dml->kyhieu = (string) $request->input('symbol');
        $id_dml->loailuong = (int) $request->input('type');
        $id_dml->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function category_delete($request) {
        $dm_luong = danhmucluong::where('id_dml', (int) $request->input('id'))->first();
        if($dm_luong) {
            $dm_luong->delete();
            return true;
        }
        return false;
    }



    // lương cố định
    public function fixedSLR_create($request) {
        try {
            luongcodinh::create([
                'sotien' => (int) $request->input('money'), 
                'id' => (int) $request->input('staff'),
                'id_dml' => (int) $request->input('category')
            ]);
            $request->session()->flash('success', 'Tạo mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function fixedSLR_update($request, $id_lcd) {
        $id_lcd->sotien = (int) $request->input('money');
        $id_lcd->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function fixedSLR_delete($request) {
        $LCD = luongcodinh::where('id_lcd', (int) $request->input('id'))->first();
        if($LCD) {
            $LCD->delete();
            return true;
        }
        return false;
    }


    // lương theo tháng
    public function monthlySLR_create($request) {
        try {
            luongtheothang::create([
                'sotien' => (int) $request->input('money'), 
                'id' => (int) $request->input('staff'),
                'id_dml' => (int) $request->input('category'),
                'thang' => $request->input('month')
            ]);
            $request->session()->flash('success', 'Tạo mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function monthlySLR_update($request, $id_ltt) {
        $id_ltt->sotien = (int) $request->input('money');
        $id_ltt->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function monthlySLR_delete($request) {
        $LTT = luongtheothang::where('id_ltt', (int) $request->input('id'))->first();
        if($LTT) {
            $LTT->delete();
            return true;
        }
        return false;
    }
}