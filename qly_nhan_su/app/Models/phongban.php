<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phongban extends Model
{
    use HasFactory;

    protected $table = "phongban";

    protected $fillable = [
        'ten'
    ];

    public $timestamps = false;
}
