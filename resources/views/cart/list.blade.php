@extends('welcome')
@section('content')
<?php
 use App\Http\Controllers\CartController;
 $total = CartController::cartItemCount();
?>
<div class="d-flex" style="background-color:whitesmoke;">
    <div class=" d-flex mt-5  border m-3  p-3" style="width: 100%; flex-direction: column; background: white; position:relative;" >
        <h3 style="margin-left:20px;margin-top:10px; color: black; ">Shopping Cart</h3>
        @foreach ($product as $product )
       
    <hr> <div class="card border-0 mx-1 item d-flex m-3 flex-row" style="width: 993px;background: white;  object-fit: cover ;">
      <img style="width: 226px;  height: 165px; object-fit: cover" class="card-img-top" src="{{ URL::to('/') }}/images/{{$product->products->image_path}}" alt="Card image cap">
      <div d-flex style="margin-left:30px; margin-top:10px; width: 300px;" >
         <strong >{{$product->products->title}}</strong> <br>
         <strong style="width: 993px; color: grey; ">{{$product->products->body}}</strong> <br>
         <strong>$ {{$product->products->price}}</strong>
         <div class="d-flex mx-3"style="margin-top:69px;">
          <a class="text-secondary mt-1 mx-1" style="text-decoration:none;" href="removecart/{{$product->id}}/destroy "><h6>Delete</h6></a>
          |<h6 class="text-secondary mt-1 mx-1">Subtotal-${{$product->quantity * $product->products->price}}</h6>
      </div>
      </div>
      <div class="d-flex"style="margin-left:160px; margin-top:10px; flex-direction: column; ">
          <h6>Quantity-{{$product->quantity}}</h6>
          <h6>Price-${{ $product->products->price}}</h6>
        </div>
       
    </div>
     
     @endforeach
    </div>
     <div class=" border d-flex mt-5  m-3  p-3" style=" width:500px; background: white; flex-direction: column;  position:sticky;">
    <h3  style="margin-left :30px;  border-radius: 12px;"> Details</h3><hr>
    <div class="d-flex">
    <div>
    <h5>Availability-</h5><br>   
    <h5>Delivery fee-</h5><br>
    <h5>Total item-</h5>
    </div>
    <div style="margin-left :175px;">
    <h5>In stocks</h5><br>
    <h5>free</h5><br>
    <h5>{{$total}}</h5>
    </div>
    </div><hr>
    
    <a class="btn btn-dark  btn-lg mt-3" href="/ordernow" style="border-radius: 12px; backdrop-filter: blur(4px);">Proceed to Buy</a>
     </div>
</div>
@endsection 