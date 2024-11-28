<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'uid',
        'email',
        'location'
    ];

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'account_character', 'account_id', 'character_id');
    }
    public function jokis()
    {
        return $this->hasMany(Joki::class);
    }

    public function topups()
    {
        return $this->hasMany(Topup::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
