<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iprating extends Model
{
    use HasFactory;
    protected $table = 'wtrs';
    protected $fillable = [
        'nama_sub3', 
        'nilai3'
    ];

}
