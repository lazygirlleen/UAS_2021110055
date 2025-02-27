<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artefact extends Model
{
    protected $fillable = [
        'set',
        'rarity',
        'set_bonus'
    ];

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
