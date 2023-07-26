<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class congthucluong extends Model
{
    use HasFactory;

    protected $table = "congthuc_luong";
    protected $primaryKey = 'id_ctl';

    protected $fillable = [
        'id_ctl',
        'ten',
        'congthuc'
    ];

    public $timestamps = false;
}
