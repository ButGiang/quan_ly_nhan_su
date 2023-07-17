<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;

use App\Models\hopdong;

class HopDongService {
    public function getDSHD() {
        return hopdong::orderBy('id', 'asc')->paginate(10);
    }
}
