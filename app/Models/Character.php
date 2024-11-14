<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Character extends Model
{
    protected $fillable = [
        'name',
        'rarity',
        'nation',
        'element',
        'weapon',
        'faction',
        'avatar',
    ];

    protected $append = [
        'avatar_url',
    ];

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? asset('storage/' . $this->avatar) : null;
    }

    public function weapons()
    {
        return $this->belongsToMany(Weapon::class, 'character_weapon');
    }


    public function account()
    {
        return $this->belongsTo(Account::class);
    }

}
