<?php

namespace App\Models;

use App\Http\Controllers\ModelController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Constructor extends Model
{
    use HasFactory;

    /**
     * 
     * Get the model from a constructor
     * 
     * @return HasMany
     */

     public function model(): HasMany
     {
         return $this->hasMany(Model::class);
     }
}
