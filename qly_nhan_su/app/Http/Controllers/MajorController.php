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

    public function delete(Request $request): JsonResponse {

    }

}
