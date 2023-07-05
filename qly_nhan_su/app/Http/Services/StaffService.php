<?php

namespace App\Http\Services;

use App\Models\Staff;
use Illuminate\Support\Facades\Session;

class StaffService {
    public function getStaffList() {
        return Staff::orderbyDesc('id')->paginate(10);
    }

    public function getMajor() {
        return Staff::select('major')->get();
    }

    public function create($request) {
        try {
            Staff::create([
                'first_name' => (string) $request->input('first_name'), 
                'last_name' => (string) $request->input('last_name'),
                'birthday' => $request->input('birthday'),
                'email' => (string) $request->input('email'),
                'address' => (string) $request->input('address'),
                'phone' => (int) $request->input('phone'),
                'major' => (string) $request->input('major'),
                'active' => (string) $request->input('active')
            ]);
            $request->session()->flash('success', 'Tạo nhân viên mới thành công!');
        }
        catch(exception $e) {
            $request->session()->flash('error', $e->getMessage());
            return false;
        }
        return true;
    }
}