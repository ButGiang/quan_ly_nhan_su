<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuyennganh extends Model
{
    use HasFactory;

    protected $table = "chuyennganh";

    protected $fillable = [
        'ten'
    ];

    public $timestamps = false;
}