<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class luongtheothang extends Model
{
    use HasFactory;

    protected $table = "luong_theothang";
    protected $primaryKey = 'id_ltt';

    protected $fillable = [
        'id_ltt',
        'thang',
        'sotien',
        'id',
        'id_dml'
    ];

    public $timestamps = false;

    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }

    public function danhmucluong() {
        return $this->hasOne(danhmucluong::class, 'id_dml', 'id_dml')->withDefault(['ten' => '']);
    }
}
