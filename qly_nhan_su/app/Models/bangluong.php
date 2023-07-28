<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bangluong extends Model
{
    use HasFactory;

    protected $table = "bang_luong";
    protected $primaryKey = 'id_bangluong';

    protected $fillable = [
        'id_bangluong',
        'thang',
        'tongluong',
        'luong',
        'id',
        'id_ungluong',
        'id_ctl'
    ];

    public $timestamps = false;

    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }

    public function congthucluong() {
        return $this->hasOne(congthucluong::class, 'id_ctl', 'id_ctl')->withDefault(['congthuc' => '']);
    }

    public function ungluong() {
        return $this->hasOne(ungluong::class, 'id_ungluong', 'id_ungluong')->withDefault(['sotien' => '0']);
    }
}
