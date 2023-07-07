<?php

namespace App\Http\Services;

use App\Models\Staff;
use Illuminate\Support\Facades\Session;

class StaffService {
    public function getStaffList() {
        return Staff::where('active', 1)->orderbyDesc('id')->paginate(10);
    }

    public function getStaff($email) {
        return Staff::where('email', '=', $email)->where('active', 1)->firstOrFail();
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
                'phone' => (string) $request->input('phone'),
                'major' => (string) $request->input('major'),
                'recruitment_day' => $request->input('recruitment_day'),
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

    public function delete($request) {
        $id = (int) $request->input('id');
        $staff = Staff::where('id', $id)->first();
        if($staff) {
            return Staff::where('id', $id)->delete();
        }
        return false;
    }
}