<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taikhoannganhang extends Model
{
    use HasFactory;

    protected $table = "taikhoannganhang";
    protected $primaryKey = 'id_tknh';

    protected $fillable = [
        'id_tknh',
        'tennganhang',
        'sotaikhoan',
        'id'
    ];

    public $timestamps = false;

    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }
}
