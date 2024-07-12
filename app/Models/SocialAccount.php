<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    use HasFactory;


    protected $fillable = [
        'provider_id',
        'provider_name',
        'user_id', // Pastikan juga menambahkan user_id jika diperlukan
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
