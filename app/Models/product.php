<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'category_id',
        'title',
        'size',
        'color',
        'category',
        'price',
        'discount_price',
        'quantity',
        'image',
    ];
    
    public function category(){
        // return $this.BelongsTo(category::class);
    }
}
