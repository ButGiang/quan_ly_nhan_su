<?php

namespace App\Helpers;

class Helper { 
    
    // custom giao diện cho active với 1 là yes và 0 là no
    public static function active($active = 0) {
        return $active = 0 ? '<span class="btn btn-danger btn-xs">No</span>' : '<span class="btn btn-success btn-xs">Yes</span>';
    }

    public static function staff_list($users) {
        $html = '';
        foreach($users as $user) {
            $html .= '
                <tr>
                    <td>'. $user->id .'</td>
                    <td>'. $user->ho. ' '. $user->ten .'</td>
                    <td>'. $user->ngaysinh .'</td>
                    <td>'. $user->CCCD .'</td>
                    <td>'. $user->email .'</td>
                    <td>'. $user->diachi .'</td>
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
                        <a class="btn btn-primary btn-sm" href="/major/edit/'. $major->id .'">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="#"
                        onclick="RemoveRow('. $major->id .', \'/major/delete\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            ';       
        }                   
        return $html;
    }

}
