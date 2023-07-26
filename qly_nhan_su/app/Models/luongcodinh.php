<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class luongcodinh extends Model
{
    use HasFactory;
    
    protected $table = "luong_codinh";
    protected $primaryKey = 'id_lcd';

    protected $fillable = [
        'id_lcd',
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
