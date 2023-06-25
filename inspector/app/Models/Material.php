<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{

    /**
     * Get material in a site
     * 
     * @return BelongsTo
     */
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * Get model from a material
     * 
     * @return BelongsTo
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Model::class);
    }

    /**
     * Get piece from material
     *
     * @return HasMany 
     */
    public function pieces(): HasMany
    {
        return $this->hasMany(Piece::class);
    }

    /**
     * Get campaign from material
     *
     * @return BelognsToMany
     */
    public function campaigns(): BelongsToMany
    {
        return $this->belongsToMany(Campaign::class, 'campaigns')->withPivot([
            'description'
        ]);
    }
}
