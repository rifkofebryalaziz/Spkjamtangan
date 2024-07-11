<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpelayar extends Model
{
    use HasFactory;
    protected $table = 'tplayar';
    protected $fillable = [
        'nama_sub4', 
        'nilai4'
    ];

}
