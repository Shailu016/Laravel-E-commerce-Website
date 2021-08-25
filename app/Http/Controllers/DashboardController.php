<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::count('id');
        $orders= Order::count('id');
        $profit=OrderProduct::sum('price');
        $todays= Order::whereDate('created_at', Carbon::today())->count('id');
        $orderstatus = Order::all();
        $pending=Order::where('order_status', 0)->count();
        $p = Order::where('order_status',0)->pluck('id');
        $loss = OrderProduct::whereIn('order_id',$p)->sum('price');
        return view('dashboard.index',compact('products','orders','todays','profit','orderstatus','pending', 'loss'));
    }

    
    public function details($id)
    {
        $order = Order::find($id);
        $products = OrderProduct::where('order_id', $order->id )->get();
        $p = OrderProduct::where('order_id', $order->id )->pluck('product_id');
        $ps = Product::whereIn('id',$p )->get();
        return view('status.product',compact('products','ps'));

    }

    
}
    