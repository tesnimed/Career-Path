<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'name_tr',
        'description_tr',
        'district',
        'side', // Avrupa / Anadolu
        'education_languages'
    ];

    protected $casts = [
        'education_languages' => 'array'
    ];

    public function majors()
    {
        return $this->belongsToMany(Major::class)
            ->withPivot('tuition_usd')
            ->withTimestamps();
    }
}

