<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thuong_phat extends Model
{
    use HasFactory;

    protected $table = "thuong_phat";
    protected $primaryKey = 'id_thuongphat';
    
    protected $fillable = [
        'id_thuongphat',
        'phanloai',
        'noidung',
        'trangthai',
        'id'
    ];

    public $timestamps = false;

    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }
}
