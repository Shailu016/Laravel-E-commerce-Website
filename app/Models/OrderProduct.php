<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'order_id',
        'product_details',
    ];
    public function order()
    {
        $this->belongsTo(Order::class,'order_id');
    }
}
