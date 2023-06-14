<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Model extends Model
{
    use HasFactory;

    /**
     * Get the constructor from a model
     * 
     * @return BelongsTo
     */
    public function constructor(): BelongsTo
    {
        return $this->belongsTo(Constructor::class);
    }

    /**
     * Get the type from a model
     *
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the material from a model
     * 
     * @return HasMany
     */
    public function material(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    /**
     * Get the piece from a model
     * 
     * @return HasMany
     */
    public function piece(): HasMany
    {
        return $this->hasMany(Piece::class);
    }

    // Table associative COMPATIBLE

    /**
     * Get the compatible model
     * 
     * @return BelongsToMany
     */
    public function compatible(): BelongsToMany
    {
        return $this->belongsToMany(Model::class, 'compatible', 'model_id', 'model_id');
    }
}
