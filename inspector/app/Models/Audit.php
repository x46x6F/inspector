<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Audit extends Pivot
{
    use HasFactory;

    /**
     * 
     * Get the user who created the audit
     * 
     * @return BelongsTo
     */

    public function piece(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     * Get the campaign of the edit
     * 
     * @return BelongsTo
     */

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
