<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trinhdo extends Model
{
    use HasFactory;

    protected $table = "trinhdo";

    protected $fillable = [
        'ten'
    ];

    public $timestamps = false;
}
