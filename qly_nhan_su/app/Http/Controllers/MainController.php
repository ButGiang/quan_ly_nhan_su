<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Services\NhanVienService;
use App\Http\Services\UploadService;
use App\Models\nhanvien;
use App\Models\taikhoan;
use App\Models\ngaynghi;


class MainController extends Controller
{
    protected $nhanvienService, $uploadService;

    public function __construct(NhanVienService $nhanvienService, UploadService $uploadService) {
        $this->nhanvienService = $nhanvienService;
        $this->uploadService = $uploadService;
    }

    public function index() {
        $id = Auth::user()->id;
        $nhanvien = $this->nhanvienService->getNhanVien($id);
            $name = $nhanvien->value('ho') .' '. $nhanvien->value('ten');
            $id_phongban = $nhanvien->value('id_phongban');
            $id_chuyennganh = $nhanvien->value('id_chuyennganh');
            $id_trinhdo = $nhanvien->value('id_trinhdo');

            $phongban = $this->nhanvienService->getPhongBan($id_phongban);
            $chuyennganh = $this->nhanvienService->getChuyenNganh($id_chuyennganh);
            $trinhdo = $this->nhanvienService->getTrinhDo($id_trinhdo);

        return view('main', [
            'title' => 'Dashboard',
            'name' => $name,
            'nhanvien' => $nhanvien,
            'phongban' => $phongban,
            'chuyennganh' => $chuyennganh,
            'trinhdo' => $trinhdo
        ]);
    }

    public function profile() {
        $id = Auth::user()->id;
        $nhanvien = $this->nhanvienService->getNhanVien($id); 
        return view('Account.profile', [
            'title' => 'Profile',
            'nhanvien' => $nhanvien
        ]);
    }

    public function post_profile(Request $request) {
        $id = Auth::user()->id;
        $nhanvien = $this->nhanvienService->getNhanVien($id);     
        $id_taikhoan = Auth::user()->id_taikhoan;
        $taikhoan = taikhoan::where('id_taikhoan', $id_taikhoan)->first();

        $this->nhanvienService->edit_profile($request, $nhanvien);

        $url = $this->uploadService->upload($request);

        if($url) {
            response()->json([
                'error' => false,
                'url' => $url
            ]);                       
            $taikhoan->avatar = $url;
            $taikhoan->save();
        }
        else {
            response()->json(['error' => true]);
        }
        return redirect('profile');
    }

    public function dayoff() {
        return view('DayOff.list', [
            'title' => 'Ngày nghỉ',
            'dayoff' => ngaynghi::orderBy('id_ngaynghi', 'asc')->get()
        ]);
    }
}
