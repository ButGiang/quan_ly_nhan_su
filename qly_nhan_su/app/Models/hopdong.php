<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hopdong extends Model
{
    use HasFactory;

    protected $table = "hopdong";

    protected $fillable = [
        'id_hopdong',
        'ngaybatdau',
        'ngayketthuc',
        'ngayki',
        'noidung',
        'hesoluong',
        'id'
    ];

    public $timestamps = false;
}
