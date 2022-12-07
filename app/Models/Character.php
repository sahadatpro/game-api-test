<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the dress that owns the Character
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dress(): BelongsTo
    {
        return $this->belongsTo(CharcterDress::class);
    }
}
