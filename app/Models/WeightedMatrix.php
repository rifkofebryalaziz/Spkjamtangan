<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightedMatrix extends Model
{
    use HasFactory;

    protected $table = 'weighted_matrices';

    protected $fillable = [
        'alternative_id',
        'criterion_id',
        'value',
    ];

    public function alternative()
    {
        return $this->belongsTo(alternatif::class);
    }

    public function criterion()
    {
        return $this->belongsTo(Kriteria::class);
    }

}
