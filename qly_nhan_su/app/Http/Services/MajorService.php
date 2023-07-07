<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Session;

use App\Models\Major;

class MajorService {
    public function getMajorList() {
        return Major::orderbyDesc('id')->paginate(10);
    }

    public function getMajor() {
        return Major::where('parent_id', 0)->get();
    }

    public function create($request) {
        try {
            Major::create([
                'name' => (string) $request->input('name'), 
                'parent_id' => (int) $request->input('parent_id'),
                'active' => $request->input('active')
            ]);
            $request->session()->flash('success', 'Tạo nghiệp vụ mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request) {

    }
}