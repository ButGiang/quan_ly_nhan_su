<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ungluong extends Model
{
    use HasFactory;

    protected $table = "ungluong";
    protected $primaryKey = 'id_ungluong';
    
    protected $fillable = [
        'id_ungluong',
        'sotien',
        'ngay',
        'ghichu',
        'trangthai',
        'id',
        'id_nguoiduyet'
    ];

    public $timestamps = false;

    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }

}
