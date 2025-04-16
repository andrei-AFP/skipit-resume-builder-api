<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function skillType()
    {
        return $this->belongsTo(SkillType::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skill');
    }

    public function experiences()
    {
        return $this->belongsToMany(Experience::class, 'experience_skill');
    }
}
