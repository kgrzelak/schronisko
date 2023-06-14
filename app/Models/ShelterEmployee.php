<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShelterEmployee extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'employed_at',
    ];

    protected $casts = [
        'employed_at' => 'datetime',
    ];

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }
}
