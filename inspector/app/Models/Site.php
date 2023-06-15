<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    /**
     * 
     * Get material from site
     * 
     * @return HasMany
     */
    public function material(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    /**
     * 
     * Get campaign from site
     * 
     * @return HasMany
     */
    public function campaign(): HasMany
    {
        return $this->hasMany(Campaign::class);
    }
}
