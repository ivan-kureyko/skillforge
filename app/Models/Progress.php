<?php

namespace App\Models;

use Database\Factories\ProgressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progress extends Model
{
    /** @use HasFactory<ProgressFactory> */
    use HasFactory;

    protected $fillable = [
        'goal_id',
        'percent',
        'note',
    ];

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }
}
