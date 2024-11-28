<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joki extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'joki_type',
        'transaction_date',
        'payment_method',
        'status',
        'price',
    ];

    //1 Account Bisa melakukan banyak transaksi Joki
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
