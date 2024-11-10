<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'account_id',
        'topup_type',
        'package',
        'payment_method',
        'transaction_date',
        'status'
    ];




}
