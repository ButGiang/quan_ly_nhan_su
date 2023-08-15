<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qtpt extends Model
{
    use HasFactory;

    protected $table = "qtpt";
    protected $primaryKey = 'id_qtpt';

    protected $fillable = [
        'id_qtpt',
        'trinhdohocvan',
        'anhTDHV',
        'kinhnghiemlamviec',
        'id'
    ];

    public $timestamps = false;
    
    public function nhanvien() {
        return $this->hasOne(nhanvien::class, 'id', 'id')->withDefault(['ten' => '']);
    }
}
