<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Campaign extends Model
{
    use HasFactory;

    /**
     * 
     * Get the user who created the campaign
     * 
     * @return BelongsTo
     */

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     * Get the site of the campaign
     *
     * @return BelongsTo
     */

    public function sites(): BelongsTo
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
        return $this->belongsToMany(Piece::class, 'audit', 'piece_id', 'campaign_id');
    }
}
