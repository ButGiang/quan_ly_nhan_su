<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuyennganh extends Model
{
    use HasFactory;

    protected $table = "chucvu";
    protected $primaryKey = 'id_chuyennganh';

    protected $fillable = [
        'id_chuyennganh',
        'ten',
        'mota'
    ];

    public $timestamps = false;
}
