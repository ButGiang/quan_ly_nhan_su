<?php

namespace App\Helpers;

class Helper { 
    
    // custom giao diện cho active với 1 là yes và 0 là no
    public static function active($active = 0) {
        return $active = 0 ? '<span class="btn btn-danger btn-xs">No</span>' : '<span class="btn btn-success btn-xs">Yes</span>';
    }

    public static function gender($gender = 1) {
        return $active = 1 ? '<span class="btn btn-info btn-xs">Nam</span>' : '<span class="btn btn-info btn-xs">Nữ</span>';
    }

    public static function staff_list($users) {
        $html = '';
        foreach($users as $user) {
            $html .= '
                <tr>
                    <td>'. $user->id .'</td>
                    <td>'. $user->ho. ' '. $user->ten .'</td>
                    <td>'. self::gender($user->gender) .'</td>
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
}
