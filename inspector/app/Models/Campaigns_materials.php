<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class campaigns_materials extends Pivot
{
    /**
     * 
     * Get the material with description
     * 
     * @return BelongsTo
     */

     public function material(): BelongsTo
     {
         return $this->belongsTo(Material::class);
     }

     /**
     * 
     * Get the material with campaign
     * 
     * @return BelongsTo
     */

     public function campaign(): BelongsTo
     {
         return $this->belongsTo(Campaign::class);
     }
}
