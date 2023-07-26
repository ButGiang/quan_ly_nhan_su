<?php

namespace App\Helpers;

class Helper { 
    
    // custom giao diện cho active với 1 là yes và 0 là no
    public static function active($active = 0) {
        if($active==0) {
            return '<span class="btn btn-danger btn-xs">No</span>';
        }
        else {
            return '<span class="btn btn-success btn-xs">Yes</span>';
        }
    }

    public static function gender($gender = 0) {
        if($gender==0) {
            return '<span class="btn btn-info btn-xs">Nữ</span>';
        }
        else {
            return '<span class="btn btn-primary btn-xs">Nam</span>';
        }
    }

    public static function staff_list($users) {
        $html = '';
        foreach($users as $user) {
            $html .= '
                <tr>
                    <td>'. $user->id .'</td>
                    <td>'. $user->ho. ' '. $user->ten .'</td>
                    <td>'. self::gender($user->gioitinh) .'</td>
                    <td>'. $user->email .'</td>
                    <td>'. $user->sdt .'</td>
                    <td>'. $user->department->ten.'</td>
                    <td>'. $user->major->ten .'</td>
                    <td>'. $user->level->ten .'</td>
                    <td>'. self::active($user->active) .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/staff/edit/'. $user->id .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $user->id .', \'/staff/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }

    public static function bank_list($banks) {
        $html = '';
        foreach($banks as $bank) {
            $html .= '
                <tr>
                    <td>'. $bank->id_tknh .'</td>
                    <td>'. $bank->nhanvien->ho. ' '. $bank->nhanvien->ten .'</td>
                    <td>'. $bank->tennganhang .'</td>
                    <td>'. $bank->sotaikhoan .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/staff/bank/edit/'. $bank->id_tknh .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $bank->id_tknh .', \'/staff/bank/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';
        }
        return $html;
    }

    public static function major_list($majors) {
        $html = '';
        foreach($majors as $major) {
            $html .= '
                <tr>
                    <td>'. $major->id_chuyennganh .'</td>
                    <td>'. $major->ten .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/major/edit/'. $major->id_chuyennganh .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $major->id_chuyennganh .', \'/major/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function department_list($departments) {
        $html = '';
        foreach($departments as $department) {
            $html .= '
                <tr>
                    <td>'. $department->id_phongban .'</td>
                    <td>'. $department->ten .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/department/edit/'. $department->id_phongban .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $department->id_phongban .', \'/department/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function contract_list($contracts) {
        $html = '';
        foreach($contracts as $contract) {
            $html .= '
                <tr>
                    <td>'. $contract->id_hopdong .'</td>
                    <td>'. $contract->nhanvien->ho. ' '. $contract->nhanvien->ten .'</td>
                    <td>'. $contract->ngayki .'</td>
                    <td>'. $contract->ngaybatdau .'</td>
                    <td>'. $contract->ngayketthuc .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/contract/edit/'. $contract->id_hopdong .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $contract->id_hopdong .', \'/contract/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function classify($classify = 0) {
        if($classify==0) {
            return '<span class="btn btn-danger btn-xs">Phạt</span>';
        }
        else {
            return '<span class="btn btn-success btn-xs">Thưởng</span>';
        }
    }

    public static function status($status = 0) {
        if($status==0) {
            return '<span class="btn btn-warning btn-xs">Đang xử lý</span>';
        }
        elseif($status==1) {
            return '<span class="btn btn-success btn-xs">Đã xử lý</span>';
        }
        else {
            return '<span class="btn btn-danger btn-xs">Đã hủy</span>';
        }
    }

    public static function reward_list($rewards) {
        $html = '';
        foreach($rewards as $reward) {
            $html .= '
                <tr>
                    <td>'. $reward->id_thuongphat .'</td>
                    <td>'. self::classify($reward->phanloai) .'</td>
                    <td>'. $reward->ngay .'</td>
                    <td>'. self::status($reward->trangthai) .'</td>
                    <td>'. $reward->nhanvien->ho. ' '. $reward->nhanvien->ten .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/extra/edit/'. $reward->id_thuongphat .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $reward->id_thuongphat .', \'/extra/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function punishment_list($punishments) {
        $html = '';
        foreach($punishments as $punishment) {
            $html .= '
                <tr>
                    <td>'. $punishment->id_thuongphat .'</td>
                    <td>'. self::classify($punishment->phanloai) .'</td>
                    <td>'. $punishment->ngay .'</td>
                    <td>'. self::status($punishment->trangthai) .'</td>
                    <td>'. $punishment->nhanvien->ho. ' '. $punishment->nhanvien->ten .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/extra/edit/'. $punishment->id_thuongphat .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $punishment->id_thuongphat .', \'/extra/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function advSalary_list($advSalarys) {
        $html = '';
        foreach($advSalarys as $advSalary) {
            $html .= '
                <tr>
                    <td>'. $advSalary->id_ungluong .'</td>
                    <td>'. $advSalary->nhanvien->ho. ' '. $advSalary->nhanvien->ten .'</td>
                    <td>'. $advSalary->ngay .'</td>
                    <td>'. $advSalary->sotien .'</td>
                    <td>'. self::status($advSalary->trangthai) .'</td>

                    <td>
                        <a class="btn btn-primary btn-sm" href="/advanceSalary/edit/'. $advSalary->id_ungluong .'">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function Salary_formula($Salarys) {
        $html = '';
        foreach($Salarys as $Salary) {
            $html .= '
                <tr>
                    <td>'. $Salary->id_ctl .'</td>
                    <td>'. $Salary->ten .'</td>
                    <td style="width: 70%">'. $Salary->congthuc .'</td>

                    <td>
                        <a class="btn btn-primary btn-sm" href="/salary/formula/edit/'. $Salary->id_ctl .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $Salary->id_ctl .', \'/salary/formula/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function loailuong($loailuong = 0) {
        if($loailuong==0) {
            return '<span class="btn btn-info btn-xs">Lương cố định</span>';
        }
        else {
            return '<span class="btn btn-primary btn-xs">Lương theo tháng</span>';
        }
    }

    public static function Salary_category($Salarys) {
        $html = '';
        foreach($Salarys as $Salary) {
            $html .= '
                <tr>
                    <td>'. $Salary->id_dml .'</td>
                    <td>'. $Salary->ten .'</td>
                    <td>'. $Salary->kyhieu .'</td>
                    <td>'. self::loailuong($Salary->loailuong) .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/salary/category/edit/'. $Salary->id_dml .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $Salary->id_dml .', \'/salary/category/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function Salary_fixedSLR($Salarys) {
        $html = '';
        foreach($Salarys as $Salary) {
            $html .= '
                <tr>
                    <td>'. $Salary->id_lcd .'</td>
                    <td>'. $Salary->nhanvien->ho. ' '. $Salary->nhanvien->ten .'</td>
                    <td>'. $Salary->danhmucluong->ten. '</td>
                    <td>'. $Salary->sotien .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/salary/fixed/edit/'. $Salary->id_lcd .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $Salary->id_lcd .', \'/salary/fixed/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

    public static function Salary_monthlySLR($Salarys) {
        $html = '';
        foreach($Salarys as $Salary) {
            $html .= '
                <tr>
                    <td>'. $Salary->id_ltt .'</td>
                    <td>'. $Salary->nhanvien->ho. ' '. $Salary->nhanvien->ten .'</td>
                    <td>'. $Salary->danhmucluong->ten. '</td>
                    <td>'. $Salary->thang. '</td>
                    <td>'. $Salary->sotien .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/salary/monthly/edit/'. $Salary->id_ltt .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $Salary->id_ltt .', \'/salary/monthly/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }
}
