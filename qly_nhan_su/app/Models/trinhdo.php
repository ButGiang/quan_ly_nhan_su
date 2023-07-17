<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trinhdo extends Model
{
    use HasFactory;

    protected $table = "trinhdo";
    protected $primaryKey = 'id_trinhdo';
    
    protected $fillable = [
        'id_trinhdo',
        'ten'
    ];

    public $timestamps = false;
}
