<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\LuongService;
use App\Models\congthucluong;
use App\Models\danhmucluong;
use App\Models\luongcodinh;
use App\Models\luongtheothang;
use App\Models\nhanvien;


class SalaryController extends Controller
{   
    protected $luongService;

    public function __construct(LuongService $luongService) {
        $this->luongService = $luongService;
    }


    // Công thức tính lương
    public function formula() {
        return view('Salary.Formula.formula', [
            'title' => 'Công thức tính lương',
            'salarys' => congthucluong::orderBy('id_ctl', 'asc')->get()
        ]);
    }

    public function formula_add() {
        return view('Salary.Formula.formula_add', [
            'title' => 'Thêm công thức tính lương'
        ]);
    }

    public function post_formula_add(Request $request) {
        $this->luongService->formula_create($request);

        return redirect('/salary/formula');
    }

    public function formula_edit(congthucluong $id_ctl) {
        return view('Salary.Formula.formula_edit', [
            'title' => 'Chỉnh sửa công thức tính lương',
            'formula' => $id_ctl
        ]);
    }

    public function post_formula_edit(Request $request, congthucluong $id_ctl) {
        $this->luongService->formula_update($request, $id_ctl);

        return redirect('/salary/formula');
    }

    public function formula_delete(Request $request) {
        $result = $this->luongService->formula_delete($request);

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



    // Danh mục lương
    public function category() {
        return view('Salary.Category.list', [
            'title' => 'Danh mục lương',
            'salarys' => danhmucluong::orderBy('id_dml', 'asc')->get()
        ]);
    }

    public function category_add() {
        return view('Salary.Category.add', [
            'title' => 'Thêm danh mục lương'
        ]);
    }

    public function post_category_add(Request $request) {
        $this->luongService->category_create($request);

        return redirect('/salary/category');
    }

    public function category_edit(danhmucluong $id_dml) {
        return view('Salary.Category.edit', [
            'title' => 'Chỉnh sửa danh mục lương',
            'category' => $id_dml
        ]);
    }

    public function post_category_edit(Request $request,danhmucluong $id_dml) {
        $this->luongService->category_update($request, $id_dml);

        return redirect('/salary/category');
    }

    public function category_delete(Request $request) {
        $result = $this->luongService->category_delete($request);

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



    // Lương cố định
    public function fixedSlr() {
        return view('Salary.FixedSLR.list', [
            'title' => 'Lương cố định',
            'LCD' => luongcodinh::orderBy('id_lcd', 'asc')->get()
        ]);
    }
    
    public function fixedSlr_select() {
        return view('Salary.FixedSLR.select_staff', [
            'title' => 'Chọn nhân viên',
            'staffs' => nhanvien::orderBy('id', 'asc')->get()
        ]);
    }

    public function post_fixedSlr_select(Request $request) {
        $id =  $request->input('staff');
        $id_dml = luongcodinh::select('id_dml')->where('id', $id)->get();
        $category = danhmucluong::whereNotIn('id_dml', $id_dml)->where('loailuong', 0)->get();
        return view('Salary.FixedSLR.add', [
            'title' => 'Thêm mới',
            'staff' => $id,
            'category' => $category
        ]);
    }

    public function post_fixedSlr_add(Request $request) {
        $this->luongService->fixedSlr_create($request);

        return redirect('/salary/fixed');
    }

    public function fixedSlr_edit(luongcodinh $id_lcd) {
        return view('Salary.FixedSLR.edit', [
            'title' => 'Chỉnh sửa mục lương cơ bản',
            'LCD' => $id_lcd
        ]);
    }

    public function post_fixedSlr_edit(Request $request,luongcodinh $id_lcd) {
        $this->luongService->fixedSlr_update($request, $id_lcd);

        return redirect('/salary/fixed');
    }

    public function fixedSlr_delete(Request $request) {
        $result = $this->luongService->fixedSlr_delete($request);

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



    // Lương theo tháng
    public function monthlySlr() {
        return view('Salary.monthlySLR.list', [
            'title' => 'Lương cố định',
            'LTT' => luongtheothang::orderBy('id_ltt', 'asc')->get()
        ]);
    }
    
    public function monthlySlr_select() {
        return view('Salary.monthlySLR.select', [
            'title' => 'Chọn nhân viên',
            'staffs' => nhanvien::orderBy('id', 'asc')->get()
        ]);
    }

    public function post_monthlySlr_select(Request $request) {
        $id =  $request->input('staff');
        $id_dml = luongtheothang::select('id_dml')->where('id', $id)->get();
        $category = danhmucluong::whereNotIn('id_dml', $id_dml)->where('loailuong', 1)->get();
        return view('Salary.monthlySLR.add', [
            'title' => 'Thêm mới',
            'staff' => $id,
            'category' => $category
        ]);
    }

    public function post_monthlySlr_add(Request $request) {
        $this->luongService->monthlySlr_create($request);

        return redirect('/salary/monthly');
    }

    public function monthlySlr_edit(luongtheothang $id_ltt) {
        return view('Salary.monthlySLR.edit', [
            'title' => 'Chỉnh sửa mục lương cơ bản',
            'LTT' => $id_ltt
        ]);
    }

    public function post_monthlySlr_edit(Request $request,luongtheothang $id_ltt) {
        $this->luongService->monthlySlr_update($request, $id_ltt);

        return redirect('/salary/monthly');
    }

    public function monthlySlr_delete(Request $request) {
        $result = $this->luongService->monthlySlr_delete($request);

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
