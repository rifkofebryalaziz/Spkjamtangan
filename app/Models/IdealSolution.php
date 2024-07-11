<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealSolution extends Model
{
    use HasFactory;

    protected $table = 'ideal_solutions';

    protected $fillable = [
        'criterion_id',
        'ideal_positive',
        'ideal_negative',
    ];

    public function criterion()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
