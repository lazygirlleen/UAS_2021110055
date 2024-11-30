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

    public function getPrice()
    {
        // Define logic to calculate the price based on the joki_type
        $prices = [
            'TypeA' => 1000,  // Example pricing logic
            'TypeB' => 2000,
            'TypeC' => 3000,
            // Add more types as needed
        ];

        return $prices[$this->joki_type] ?? 0;  // Default to 0 if no matching type
    }

    //1 Account Bisa melakukan banyak transaksi Joki
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
