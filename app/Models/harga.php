<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class harga extends Model
{
    use HasFactory;

    protected $table = 'hrg'; 

    
    protected $fillable = [
        'nama_sub1', 
        'nilai1'
    ];

}
