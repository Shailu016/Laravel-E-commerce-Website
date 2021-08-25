@extends('layouts.app')
@section('content')

<div class="d-flex">

<div class="col-2 border" style="background-color:#101010;">
<div class="container"><a href="/product"><h1 class="text-light" style="font-family: 'Times New Roman', serif;">Admin</h1></a></div>


          
<h5 class="mt-4 "><a class="text-light" style=" font-family: Arial, Helvetica, sans-serif;" href="/dashboard">Dashboard</a></h5>
<h5 class="mt-4 "><a class="text-light" style=" font-family: Arial, Helvetica, sans-serif;" href="/category">Categories</a></h5>
<h5 class="mt-4 "><a class="text-light" style=" font-family: Arial, Helvetica, sans-serif;" href="/status">Orders</a> </h5>
<h5 class="mt-4 "><a class="text-light" style=" font-family: Arial, Helvetica, sans-serif;" href="/current">Today's Order</a> </h5>
          
</div>

  <div class="col-10 border">
<div class = "">
<table class="table" >
  <thead>
    <tr>
      <th scope="col">OrderId</th>
      <th scope="col">PaymentMethod</th>
      <th scope="col">OrderStatus</th>
      <th scope="col">DeliveryAddress</th>
      <th scope="col">created_at</th>
    </tr>
  </thead>
  <tbody>
    
  @foreach ($orders as $order )
      <tr>
        <th scope="row">{{$order->id}}</th>
        <td>{{$order->payment_method}}</td>
        <td>{{$order->order_status}}</td>
        <td>{{$order->delivery_address}}</td>
        <td>{{$order->created_at}}</td>
      </tr>
        @endforeach
        
        
    </tbody>
</table> 

</div>

</div>
@endsection 