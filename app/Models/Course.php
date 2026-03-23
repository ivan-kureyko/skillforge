<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'skill_id',
        'author_id',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }

}
