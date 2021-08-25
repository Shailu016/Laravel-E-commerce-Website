<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function add_to_cart(Request $request, $product_id)
  {
    $cart_id = $request->session()->get('cart_id');
     
    if (!$cart_id)
    {
      $cart = new Cart();
      $cart->save();
      $cart_id = $cart->id;
      $request->session()->put('cart_id', $cart_id);
    }
    
    $cart = CartProduct::where('cart_id', $cart_id)
    ->where('product_id', $request->product_id)
    ->first();
    
    if ($cart) 
    {
      $cart->increment('quantity', 1);
      return  redirect()->back()->with('message','Product added to cart successfully!');
    }
    
    $cart = Cart::findOrFail($cart_id);
    $cartproduct = CartProduct::create([
      'cart_id' => $cart->id,
      'product_id' => $request->product_id,
      'quantity' => 1
    ]);
    
    return redirect()->back()->with('message','Product added to cart successfully!');
  }

  public function cartlist(Request $request)
  {

   
    $cart_id = $request->session()->get('cart_id');
    $product = CartProduct::with('products')->where('cart_id', $cart_id)->get();
    return view('cart.list', compact('product'));
  }
  
  static function cartItemCount()
  {
    $cart_id = request()->session()->get('cart_id');
    $cart_product = CartProduct::where('cart_id', $cart_id)->sum('quantity');
    return $cart_product;  
  }
  public function removecart($id)
  {
     $cart= CartProduct::find($id);
     $cart->delete(); 
     return redirect()->back();
  }
}
