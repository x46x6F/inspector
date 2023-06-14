<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use HasFactory;

    /**
     * Put the timestamps at false
     *
     * @var boolean
     */
    public $timestamps = false;


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
        return $this->belongsTo(Model::class);
    }

    /**
     * Get piece from material
     *
     * @return HasMany 
     */
    public function piece(): HasMany
    {
        return $this->hasMany(Piece::class);
    }
}
