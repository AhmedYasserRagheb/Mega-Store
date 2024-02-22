<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'UserId',
        'UserName',
        'email',
        'Phone',
        'Address',
        'productId',
        'Item',
        'Quantity',
        'price',
    ];
}
