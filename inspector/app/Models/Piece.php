<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Piece extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Get model from a piece
     * 
     * @return BelongsTo
     */
    public function models(): BelongsTo
    {
        return $this->belongsTo(Piece::class);
    }

    /**
     * Get material from a piece
     * 
     * @return BelongsTo
     */
    public function materials(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    /**
     * Get campaign from a piece
     * 
     * @return BelongsToMany
     */
    public function campaigns(): BelongsToMany
    {
        return $this->belongsToMany(Campaign::class, 'audit', 'model_id', 'model_id2');
    }
}
