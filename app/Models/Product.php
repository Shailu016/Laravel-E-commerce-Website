<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'excerpt',
    'body',
      'price',
      'category_id',
      'image_path',
  ];
    

    public function categories()
    {
      return $this->belongsTo(Category::class);
    }

    public function cart() 
   {
     return $this->hasMany(Cart::class);
   }
   public function orders()
   {
      return $this->belongsToMany(Order::class);
   } 

   public function orderproduct()
   {
     $this->hasMany(OrderProduct::class);
   }

   public function cartproduct()
   {
     $this->hasMany(CartProduct::class);
   }
}
