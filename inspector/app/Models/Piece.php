<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Piece extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Get model from a piece
     * 
     * @return BelongsTo
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Model::class);
    }

    /**
     * Get material from a piece
     * 
     * @return BelongsTo
     */
    public function material(): BelongsTo
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
        return $this->belongsToMany(Campaign::class, 'audit', 'piece_id', 'campaign_id')->withPivot([
           'audit',
           'presence',
           'functional',
           'month',
           'usury',
           'change',
           'complement',
           'recommended',
        ]);
    }

    /**
     * 
     * Get the audit of the campaign
     *
     * @return HasMany
     */

     public function audits(): HasMany
     {
         return $this->hasMany(Audit::class);
     }
}
