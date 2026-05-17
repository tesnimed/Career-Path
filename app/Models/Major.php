<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'name',
        'description',
        'degree_type', // ön_lisans | lisans
        'education_language'
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function universities()
    {
        return $this->belongsToMany(University::class)
            ->withPivot('tuition_usd')
            ->withTimestamps();
    }
    
}