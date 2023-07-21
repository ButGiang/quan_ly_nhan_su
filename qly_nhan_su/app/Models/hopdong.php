<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hopdong extends Model
{
    use HasFactory;

    protected $table = "hopdong";
    protected $primaryKey = 'id_hopdong';

    protected $fillable = [
        'id_hopdong',
        'ngaybatdau',
        'ngayketthuc',
        'ngayki',
        'noidung',
        'id',
        'id_nguoitao'
    ];

    public $timestamps = false;

    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }

    public function nguoitaohopdong() {
        return $this->hasOne(nhanvien::class, 'id', 'id_nguoitao')->withDefault(['ten' => '']);
    }
}
