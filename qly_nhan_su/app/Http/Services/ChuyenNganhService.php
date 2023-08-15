<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Session;

use App\Models\chuyennganh;

class ChuyenNganhService {

    public function getDSCN() {
        return chuyennganh::orderBy('id_chuyennganh', 'asc')->paginate(10);
    }

    public function getChuyenNganh($id_chuyennganh) {
        return chuyennganh::where('id_chuyennganh', $id_chuyennganh)->value('ten');
    }

    public function create($request) {
        try {
            chuyennganh::create([
                'ten' => (string) $request->input('name'),
                'mota' => (string) $request->input('describe'),
            ]);
            $request->session()->flash('success', 'Tạo Chức vụ mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $major): bool {
        $major->ten = (string) $request->input('name');
        $major->mota = (string) $request->input('describe');
        $major->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function delete($request) {
        $chuyennganh = chuyennganh::where('id_chuyennganh', (int) $request->input('id'))->first();
        if($chuyennganh) {
            $chuyennganh->delete();
            return true;
        }
        return false;
    }
}