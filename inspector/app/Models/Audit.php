<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Audit extends Model
{
    use HasFactory;

    /**
     * 
     * Get the user who created the audit
     * 
     * @return HasMany
     */

    public function user(): HasMany
    {
        return $this->HasMany(User::class);
    }

    /**
     * 
     * Get the campaign of the edit
     * 
     * @return BelongsTo
     */

    public function campaigns(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
