<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as AbstractModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Model extends AbstractModel
{
    use HasFactory;

    public $incrementing = false;

    public $keyType = 'string';

    // mutateur permettant de modifier la valeur de has-electro
    // si egal a 1 alors electrique sinon non éléctrique.
    public function getHasElectroAttribute($value)
    {
        return $value == 1 ? 'électrique' : 'non électrique';
    }

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
        return $this->belongsToMany(\App\Models\Model::class, 'compatible', 'model_id', 'model_id');
    }
}
