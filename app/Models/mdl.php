<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mdl extends Model
{
    use HasFactory;
    protected $table = 'mdl';
    protected $fillable = [
        'nama_sub2', 
        'nilai2'
    ];

}
