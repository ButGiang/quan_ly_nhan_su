<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\ChuyenNganhService;
use App\Models\chuyennganh;

class MajorController extends Controller
{
 
    protected $chuyennganhService;

    public function __construct(ChuyenNganhService $chuyennganhService) {
        $this->chuyennganhService = $chuyennganhService;
    }

    public function index() {
        return view('Major.list', [
            'title' => 'Major list',
            'majors' => $this->chuyennganhService->getDSCN()
        ]);
    }

    public function create() {
        return view('Major.add', [
            'title' => 'Add Major',
            'majors' => $this->chuyennganhService->getDSCN()
        ]);
    }

    public function post_create(Request $request) {
        $this->chuyennganhService->create($request);
        return redirect()->back();
    }

    public function edit($id_chuyennganh) {
        $major = chuyennganh::where('id_chuyennganh', $id_chuyennganh)->first();
        return view('Major.edit', [
            'title' => 'edit Major: '. $major->ten,
            'major' => $major
        ]);
    }

    public function post_edit(Request $request, $id_chuyennganh) {
        $major = chuyennganh::where('id_chuyennganh', $id_chuyennganh)->first();
        $this->chuyennganhService->update($request, $major);
        return redirect('/major/list');
    }

    public function delete(Request $request) {
        $result = $this->chuyennganhService->delete($request);

        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công!'
            ]);
            return location.reload();
        }
        return response()->json([
            'error' => true
        ]);
    }

}
