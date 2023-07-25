<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Audit extends Pivot
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'audit';

    /**
     * Permet d'utiliser des clefs composées pour le save ou update 
     *
     * @param Builder $query
     * @return Builder
     * 
     * @see https://blog.maqe.com/solved-eloquent-doesnt-support-composite-primary-keys-62b740120f
     * @see https://stackoverflow.com/questions/66480754/incompatible-method-with-the-override-of-setkeysforsavequery-on-laravel-8
     */
    protected function setKeysForSaveQuery($query): Builder
    {
        $query
            ->where('campaign_id', '=', $this->getAttribute('campaign_id'))
            ->where('piece_id', '=', $this->getAttribute('piece_id'));

        return $query;
    }

    /**
     * 
     * Get the user who created the audit
     * 
     * @return BelongsTo
     */

    public function piece(): BelongsTo
    {
        return $this->belongsTo(Piece::class);
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
