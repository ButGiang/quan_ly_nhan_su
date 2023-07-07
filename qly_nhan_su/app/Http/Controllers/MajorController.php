<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\MajorService;
use App\Models\Major;

class MajorController extends Controller
{
 
    protected $majorService;

    public function __construct(MajorService $majorService) {
        $this->majorService = $majorService;
    }

    public function index() {
        return view('Major.list', [
            'title' => 'Major list',
            'majors' => $this->majorService->getMajorList()
        ]);
    }

    public function create() {
        return view('Major.add', [
            'title' => 'Add Major',
            'majors' => $this->majorService->getMajor()
        ]);
    }

    public function post_create(Request $request) {
        $this->majorService->create($request);

        return redirect()->back();
    }

    public function delete(Request $request): JsonResponse {

    }

}
