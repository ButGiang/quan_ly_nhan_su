<?php

namespace App\Helpers;

class Helper { 
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
                    <td style="width: 60px; height: 60px; text-align: center; border: 1px solid black; border-radius: 64px">'. $user->avatar .'</td>
                    <td>'. $user->ho. ' '. $user->ten .'</td>
                    <td>'. self::gender($user->gioitinh) .'</td>
                    <td>'. $user->email .'</td>
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

    public static function insurance_list($insurances) {
        $html = '';
        foreach($insurances as $insurance) {
            $html .= '
                <tr>
                    <td>'. $insurance->id_baohiem .'</td>
                    <td>'. $insurance->nhanvien->ho. ' '. $insurance->nhanvien->ten .'</td>
                    <td>'. $insurance->mabaohiem .'</td>
                    <td>'. $insurance->noidangki .'</td>
                    <td>'. $insurance->ngaydangki .'</td>
                    <td>'. $insurance->noikhambenh .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/staff/insurance/edit/'. $insurance->id_baohiem .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $insurance->id_baohiem .', \'/staff/insurance/delete\')">
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


    public static function TDHV($tdhv = 0) {
        if($tdhv==0) {
            return '<span class="btn btn-info btn-xs">Cấp 3</span>';
        }
        elseif($tdhv==1) {
            return '<span class="btn btn-warning btn-xs">Cao đẳng</span>';
        }
        elseif($tdhv==2) {
            return '<span class="btn btn-success btn-xs">Đại học</span>';
        }
        else {
            return '<span class="btn btn-primary btn-xs">Cao học</span>';
        }
    }

    public static function grown_process_list($grown_process) {
        $html = '';
        foreach($grown_process as $gp) {
            $html .= '
                <tr>
                    <td>'. $gp->id_qtpt .'</td>
                    <td>'. $gp->nhanvien->ho. ' '. $gp->nhanvien->ten .'</td>
                    <td>'. self::TDHV($gp->trinhdohocvan) .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="grown_process/edit/'. $gp->id_qtpt .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $gp->id_qtpt .', \'grown_process/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }



    public static function loaiTT($tt = 0) {
        if($tt==0) {
            return '<span class="btn btn-primary btn-xs">Bằng cấp</span>';
        }
        elseif($tt==1) {
            return '<span class="btn btn-warning btn-xs">Chứng chỉ</span>';
        }
        elseif($tt==2) {
            return '<span class="btn btn-success btn-xs">Thành tích</span>';
        }
    }

    public static function achievement_list($achievement) {
        $html = '';
        foreach($achievement as $ach) {
            $html .= '
                <tr>
                    <td>'. $ach->id_thanhtuu .'</td>
                    <td>'. $ach->nhanvien->ho. ' '. $ach->nhanvien->ten .'</td>
                    <td>'. self::loaiTT($ach->loai) .'</td>
                    <td>'. $ach->ten .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="achievement/edit/'. $ach->id_thanhtuu .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $ach->id_thanhtuu .', \'achievement/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }
}
