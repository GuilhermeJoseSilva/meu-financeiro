<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable  = [
        'type',
        'amount',
        'category',
        'reason',
        'date'
    ];

    protected $casts = [
        'date' => 'date',
    ];
}