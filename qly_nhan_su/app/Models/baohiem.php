<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baohiem extends Model
{
    use HasFactory;

    protected $table = "baohiem";
    protected $primaryKey = 'id_baohiem';

    protected $fillable = [
        'id_baohiem',
        'mabaohiem',
        'ngaydangki',
        'noidangki',
        'noikhambenh',
        'id'
    ];

    public $timestamps = false;

    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }
}
