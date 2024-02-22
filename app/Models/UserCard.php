<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'User_id',
        'Name',
        'email',
        'phone',
        'address',

        'Product_id',
        'Item',
        'quantity',
        'price',


        'payment_status',
        'delivery_status',

    ];
}
