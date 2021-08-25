<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'payment_method',
        'order_status',
        'delivery_address',
    ];
    public function products()
    {
       return $this->belongsToMany(Product::class);
    }

    public function orderproducts()
    {
       return $this->belongsToMany(OrderProduct::class);
    }
}
