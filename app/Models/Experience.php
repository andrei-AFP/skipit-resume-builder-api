<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company',
        'logo',
        'position',
        'location',
        'start_date',
        'end_date',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'experience_skill');
    }

    public function skillsByType()
    {
        return $this->skills->sortBy('id')
            ->groupBy(function ($skill) { return $skill->skillType->name; });
    }
}
