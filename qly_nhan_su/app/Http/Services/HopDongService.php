<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

use App\Models\hopdong;

class HopDongService {
    public function getDSHD() {
        return hopdong::orderBy('id_hopdong', 'asc')->paginate(10);
    }

    public function getHD($id_hopdong) {
        return hopdong::where('id_hopdong', $id_hopdong)->first();
    }

    public function create($request) {
        try {
            hopdong::create([
                'ngayki' => $request->input('signing_day'), 
                'ngaybatdau' => $request->input('start_day'),
                'ngayketthuc' => $request->input('end_day'),
                'noidung' => $request->input('content'),
                'id' => (int) $request->input('staff'),
                'id_nguoitao' => (int) Auth::user()->id
            ]);
            $request->session()->flash('success', 'Tạo hợp đồng mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $hopdong) {
        $hopdong->ngayki = $request->input('signing_day');
        $hopdong->ngaybatdau = $request->input('start_day');
        $hopdong->ngayketthuc = $request->input('end_day');
        $hopdong->noidung = (string) $request->input('content');
        $hopdong->save();

        $request->session()->flash('success', 'Cập nhật thành công');
        return true;
    }

    public function delete($request) {
        $hopdong = hopdong::where('id_hopdong', (int) $request->input('id'))->first();
        if($hopdong) {
            $hopdong->delete();
            return true;
        }
        return false;
    }
}
