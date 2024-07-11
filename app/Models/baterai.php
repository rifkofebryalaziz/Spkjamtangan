<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baterai extends Model
{
    use HasFactory;
    protected $table = 'btry';
    protected $fillable = [
        'nama_sub5', 
        'nilai5'
    ];

}
