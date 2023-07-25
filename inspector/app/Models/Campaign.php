<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;

    /**
     * 
     * Get the user who created the campaign
     * 
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * 
     * Récupère l'utilisateur qui devra auditer
     * 
     * @return BelongsTo
     */
    public function auditor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'auditor_id');
    }

    /**
     * 
     * Get the site of the campaign
     *
     * @return BelongsTo
     */

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    /**
     * 
     * Get the pieces from the campaign
     * 
     * @return BelongsToMany
     */

    public function pieces(): BelongsToMany
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
     * Get material from campaign
     *
     * @return HasMany 
     */
    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'materials')->withPivot([
            'description'
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
