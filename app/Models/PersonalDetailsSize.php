<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetailsSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'female_cabin_shoes',
        'female_ground_shoes',
        'female_red_skirt',
        'female_red_blazer',
        'compression_top',
        'male_black_pants',
        'male_shoes',
        'male_black_blazer',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
