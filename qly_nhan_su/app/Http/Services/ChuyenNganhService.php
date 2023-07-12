<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Session;

use App\Models\chuyennganh;

class ChuyenNganhService {

    public function getDSCN() {
        return chuyennganh::orderBy('id_chuyennganh', 'asc')->paginate(10);
    }

    public function getChuyenNganh($id_chuyennganh) {
        return chuyennganh::where('id_chuyennganh', $id_chuyennganh)->value('name');
    }

    public function create($request) {
        try {
            chuyennganh::create([
                'ten' => (string) $request->input('name'), 
            ]);
            $request->session()->flash('success', 'Tạo Chuyên ngành mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function edit() {
        
    }

    public function delete($request) {

    }
}