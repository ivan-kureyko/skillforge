<?php

namespace App\Models;

use Database\Factories\ProgressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    /** @use HasFactory<ProgressFactory> */
    use HasFactory;

    protected $fillable = [
        'goal_id',
        'percent',
        'note',
    ];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
