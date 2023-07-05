<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class Helper {
    // lấy danh sách các danh mục và đưa vào table ở view admin/menu/list
    public static function user_list($users) {
        $html = '';
        foreach($users as $key => $user) {
                $html .= '
                    <tr>
                        <td>'. $user->id .'</td>
                        <td>'. $user->first_name .'</td>
                        <td>'. $user->last_name .'</td>
                        <td>'. $menu->email .'</td>
                        <td>'. $menu->address .'</td>
                        <td>'. $menu->phone .'</td>
                        <td>'. self::active($user->active) .'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/staff/edit/'. $menu->id .'">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#"
                            onclick="RemoveRow('. $user->id .', \'/staff/delete\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';

                // sau khi lấy đc data từ vị trí $user[$key] thì xóa nó đi
                unset($users[$key]);
                // đệ quy để lấy hết danh sách
                $html .= self::user_list($users, $user->id);
        }
        return $html;
    }


    // custom giao diện cho active với id=1 là yes và 0 là no
    public static function active($active = 0) {
        return $active = 0 ? '<span class="btn btn-danger btn-xs">No</span>' :
                    '<span class="btn btn-success btn-xs">Yes</span>';
    }

}
