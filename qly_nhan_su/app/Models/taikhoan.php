<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;   

class taikhoan extends Authenticatable
{
    use HasFactory;
    
    protected $table = "taikhoan";
    protected $primaryKey = 'id_taikhoan';

    protected $fillable = [
        'id_taikhoan',
        'email',
        'matkhau',
        'role',
        'avatar',
        'user_token',
        'id'
    ];

    public $timestamps = false;

    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }
}
