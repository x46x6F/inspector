<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Models extends Model
{
    use HasFactory;

    /**
     * Get the constructor from a model
     * 
     * @return BelongsTo
     */
    public function constructors(): BelongsTo
    {
        return $this->belongsTo(Constructor::class);
    }

    /**
     * Get the type from a model
     *
     * @return BelongsTo
     */
    public function types(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the material from a model
     * 
     * @return HasMany
     */
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    /**
     * Get the piece from a model
     * 
     * @return HasMany
     */
    public function pieces(): HasMany
    {
        return $this->hasMany(Piece::class);
    }

    // Table associative COMPATIBLE

    /**
     * Get the compatible model
     * 
     * @return BelongsToMany
     */
    public function compatibles(): BelongsToMany
    {
        return $this->belongsToMany(Model::class, 'compatible', 'model_id', 'model_id');
    }
}
