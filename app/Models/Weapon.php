<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    protected $fillable = [
        'name',
        'rarity',
        'type',
        'base_atk',
        'secondary_stat',
        'secondary_stat_value',
        'avatar'
    ];

    protected $appends = [
        'avatar_url',
    ];

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? asset('images/' . $this->avatar) : null;
    }

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
