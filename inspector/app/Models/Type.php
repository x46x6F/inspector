<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    /**
     * 
     * Get model from a type
     * 
     * @return HasMany
     */
    public function models(): HasMany
    {
        return $this->hasMany(Model::class);
    }
}
