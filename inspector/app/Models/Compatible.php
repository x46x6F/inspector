<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Compatible extends Pivot
{
    public $timestamps = false;
    
    /**
     * 
     * Get compatible from model
     * 
     * @return HasMany
     */
    public function compatible(): HasMany
    {
        return $this->hasMany(Model::class);
    }
}
