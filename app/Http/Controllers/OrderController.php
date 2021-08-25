<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Users;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderdetailsMail;
use App\Notifications\OrderNotification;
use Nexmo\Laravel\Facade\Nexmo;


use Illuminate\Support\Facades\Mail;
use Auth;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart_products = $this->getCartProducts();
        return view('order.index',compact('cart_products'));
    }
    
    public function getCartProducts()
    {
        $cart_id = request()->session()->get('cart_id');
        return CartProduct::with('products')->where('cart_id', $cart_id)->get();
    }

    public function orderplace(Request $request)
    {
        request()->validate([
            'payment'=>'required', 
            'delivery_address'=>'required|alpha' 
        ]);
        $cart_id = request()->session()->get('cart_id');
        $cart_products = $this->getCartProducts();

        if (Auth::check()) {
            $orders = Order::create([
            "user_id" => auth()->user()->id,
            "order_status" => 0,
            "payment_method" => $request->payment,
            "delivery_address" => $request->delivery_address,
            ]);

        foreach ($cart_products as $cart_product)
         {
            $order_product = OrderProduct::create([
            "order_id" => $orders->id,
            "product_id" => $cart_product->product_id,
            "quantity" => $cart_product->quantity,
            "price" => $cart_product->products->price * $cart_product->quantity
             ]);
         }
         
} 
        
        else {
            return redirect('/login');
        }

         $order_id = $orders->id;
         $request->session()->forget('cart_id');
         $cart_products = CartProduct::where('cart_id', $cart_id)->delete();


         $user = auth()->user();
         $email = $user->email;
         
         Mail::to($email)->send(new OrderdetailsMail($orders));
         $user->notify(new OrderNotification($orders));
        

        //  Nexmo::message()->send([
        //      'to'=>'918115342928',
        //      'from'=>'sender',
        //      'text'=>'hello Laravl Nexmo Notification XD'
        //  ]);
         return redirect()->route('recipt', $order_id);
    }
    
}
