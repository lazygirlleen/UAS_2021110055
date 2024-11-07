<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    protected $fillable = [
        'id',
        'topup_type',
        'price',
        'transaction_date',
        'status'
    ];




}
