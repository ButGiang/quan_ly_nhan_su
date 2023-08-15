<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phongban extends Model
{
    use HasFactory;

    protected $table = "phongban";
    protected $primaryKey = 'id_phongban';

    protected $fillable = [
        'id_phongban',
        'ten',
        'mota'
    ];

    public $timestamps = false;
}
