<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\CartProduct;
use App\Http\Controllers\CartController;

class OrderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        
        $total = CartController::cartItemCount();
        if(! $total){
 
            return redirect('/')->with('message','No products for Order');
        }

       
        return $next($request);
    }
}
