<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class OrderManagementController extends Controller
{
   public function index()
   {
       $orders= Order::all();
       return view('status.index',compact('orders'));

   }

   public function current()
   {
       $orders= Order::whereDate('created_at', Carbon::today())->get();
       return view('status.current',compact('orders'));
    }
}
