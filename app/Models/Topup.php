<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'topup_type',
        'package',
        'payment_method',
        'transaction_date',
        'status'
    ];


    public function account()
    {
        return $this->belongsTo(Account::class);
    }

}
