<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    protected $fillable = [
        'name',
        'rarity',
        'type'
    ];

    protected $append = [
        'avatar_url',
    ];

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? asset('images/' . $this->avatar) : null;
    }

    public function characters()
    {
    return $this->belongsToMany(Character::class, 'character_weapon')
                ->withPivot('type')
                ->withTimestamps();
    }



}
