<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeparationMeasure extends Model
{
    use HasFactory;

    protected $table = 'separation_measures';

    protected $fillable = [
        'alternative_id',
        'separation_positive',
        'separation_negative',
    ];

    public function alternative()
    {
        return $this->belongsTo(alternatif::class);
    }
}
