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
            return '<span class="btn btn-info btn-xs">Nam</span>';
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
}
