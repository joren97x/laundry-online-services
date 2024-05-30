<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'fabric_id',
        'detergent_id',
        'payment_option',
        'total_amount',
        'weight',
        'status'
    ];
}
