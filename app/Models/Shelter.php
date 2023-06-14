<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shelter extends Model
{
    protected $fillable = [
        'name'
    ];

    public function cats(): HasMany
    {
        return $this->hasMany(ShelterCat::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(ShelterEmployee::class);
    }
}
