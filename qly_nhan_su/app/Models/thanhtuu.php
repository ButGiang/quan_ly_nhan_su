<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhtuu extends Model
{
    use HasFactory;
    
    protected $table = "thanhtuu";
    protected $primaryKey = 'id_thanhtuu';

    protected $fillable = [
        'id_thanhtuu',
        'loai',
        'ten',
        'ngaycap',
        'mota',
        'hinhanh',
        'id'
    ];

    public $timestamps = false;
    
    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }
}
