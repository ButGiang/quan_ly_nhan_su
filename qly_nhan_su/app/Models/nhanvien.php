<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    use HasFactory;

    protected $table = "nhanvien";

    protected $fillable = [
        'ho',
        'ten',
        'gioitinh',
        'ngaysinh',
        'CCCD',
        'email',
        'diachi',
        'sdt',
        'avatar',
        'ngaytuyendung',
        'active',
        'id_phongban',
        'id_chuyennganh',
        'id_trinhdo'
    ];


    public function department() {
        return $this->hasOne(phongban::class, 'id_phongban', 'id_phongban')->withDefault(['ten' => '']);
    }

    public function major() {
        return $this->hasOne(chuyennganh::class, 'id_chuyennganh', 'id_chuyennganh')->withDefault(['ten' => '']);
    }

    public function level() {
        return $this->hasOne(trinhdo::class, 'id_trinhdo', 'id_trinhdo')->withDefault(['ten' => '']);
    }
}
