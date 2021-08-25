@extends('welcome')
@section('content')
<?php
 use App\Http\Controllers\CartController;
 $total = CartController::cartItemCount();
?>

<div class="d-flex">
    <div class=" d-flex mt-5 containerHeight  m-3  p-3" style="width: 50%;   " >
    
    
    <form action="/orderplace" method="POST" style="float-left;">
    
@csrf
<div class="form-group">
  <label for="address" class="form-label"><h4>Address</h4></label>
  <textarea class="form-control border border-dark" style="height:170px;width:500px;"name ="delivery_address"></textarea>
  @if($errors->has('payment'))
        <p style='color:red;'>{{$errors->first('delivery_address')}}</p>
     @endif
  <div>
    <label for="pwd" class="mt-2"><h4>Payment Method</h4></label><br>
    @if($errors->has('payment'))
        <p style='color:red;'>{{$errors->first('payment')}}</p>
     @endif
<img style="width:250px; height:90px;" src="data:image/png;base64,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" alt=""><input type="radio" value="Online" name='payment'style=" width: 25px;
    height: 25px;
"></div>
<div><img style="width:250px; height:90px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnTjXZTZ2aMdw9yv4b5_6d_TlVuJDjl08XnQ&usqp=CAU" alt=""><input type="radio" value="cash" name='payment' style=" width: 25px;
    height: 25px;
"></div>
<div><img style="width:250px; height:90px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTntv8dHhcz9mox6kzKghf7Ht2aNhCBI2pOgQ&usqp=CAU" alt=""><input type="radio" value="bank" name='payment'  style=" width: 25px;
    height: 25px;
"></div>
</div>


</div>
<div class="  d-flex mt-5  " style=" background: white; flex-direction: column;">
<img class="w-100"src="https://superdevresources.com/wp-content/uploads/2021/03/Ultimate-Payment-Icon-Set.jpg" alt="">
</div>
<div class=" border d-flex mt-5 containerHeight m-3  p-3" style=" background: white; flex-direction: column;">
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
 <button type="submit" class="btn btn-success"style="border-top-right-radius: 100px;border-bottom-right-radius: 100px; font-family: 'Times New Roman', serif;font-weight: 600;hover:background:blue;" >procees to checkout >></button>
</div>
</form>
</div>

@endsection 