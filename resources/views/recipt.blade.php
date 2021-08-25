@extends('welcome')
@section('content')
<div class="conatiner ">
  <div class=" d-flex m-auto containerHeight  mt-5  p-3" style="width: 40%; flex-direction: column; background: white;" >
   <h1 class="mx-auto" style=" color:black;text-shadow: 2px 2px 5px black;">Thank you </h1>
   <h2 class="mx-auto" style="color:black;text-shadow: 2px 2px 5px black;">Order placed successfully!</h2>
  </div>
<div class=" border d-flex m-auto containerHeight mt-3  p-3" style=" background: whitesomke; flex-direction: column;box-shadow: 10px 10px 5px grey;">
    <h3  style="margin-left :30px;s">Receipt</h3><hr>
    <div class="d-flex">
    <div>
    <h5>Availability-</h5><br>
    <h5>Delivery fee-</h5><br>
    <h5>Total item</h5><br>
    <h5>Grand Total</h5>
    </div>
    <div style="margin-left :175px;">
    <h5>In stocks</h5><br>
    <h5>free</h5><br>
    <h5>{{$cartQ}}</h5><br>
    <h5>${{$cartP}}</h5>
    </div>
</div>
@endsection 