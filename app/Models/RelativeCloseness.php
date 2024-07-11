<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelativeCloseness extends Model
{
    use HasFactory;

    protected $table = 'relative_closeness';

    protected $fillable = [
        'alternative_id',
        'value',
    ];

    public function alternative()
    {
        return $this->belongsTo(alternatif::class);
    }
}
