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
        'email',
        'location'
    ];

    public function characters()
    {
        return $this->belongsToMany(Account::class, 'account_character');
    }

    public function jokis()
    {
        return $this->hasMany(Joki::class);
    }

    public function topups()
    {
        return $this->hasMany(Topup::class);
    }
}
