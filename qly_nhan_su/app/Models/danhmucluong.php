<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmucluong extends Model
{
    use HasFactory;

    protected $table = "danhmuc_luong";
    protected $primaryKey = 'id_dml';

    protected $fillable = [
        'id_dml',
        'ten',
        'kyhieu',
        'loailuong'
    ];

    public $timestamps = false;
}
