<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\User;
use Auth;

class ReciptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order_id)
    {
          if(Auth::check()){
          $cartQ = OrderProduct::where('order_id',$order_id)->sum('quantity');
          $cartP = OrderProduct::where('order_id',$order_id)->sum('price');

          return view('recipt',compact('cartQ','cartP'));
        }
        
        return redirect('/home');
    }
}
