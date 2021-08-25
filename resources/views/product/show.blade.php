@extends('welcome')
@section('content')

@if(session('message'))
<div class="m-1"style="font-family: 'Times New Roman', serif; font-weight:10px;background-color:whitesmoke;">
    <h5>{{session('message')}}</h5>
    <a href="/list">Click to check details</a>
</div>
@endif
<div class= 'd-flex container mt-4'style="width: 90vw; height: 100vh;">
<div class="col-4 p-1 mt-5">
<div>
      <a href="/product/{{$product->id}}"><img class="w-100"style= " margin-right:100px; " class="card-img-top" src="{{ URL::to('/') }}/images/{{$product->image_path}}" alt="Card image cap"></a>
    </div>
</div>
<div class="col-8  p-1" style="margin-left:100px;">
<div class=" mx-1  p-3" >
      <p class="p-1" ><h2 class="text-secondary">{{$product->title}}</h2></p>
      <p class="p-1"><h5>{{$product->excerpt}}</h3></p>
      <p class="p-1"><h5>{{$product->body}}</h3></p>
      <p ><strong>${{$product->price}}</strong></p>
      <p ><h6><strong>Available offers</strong></h6></p>
      <p ><h6><strong>Special Price</strong> Get extra 10% off (price inclusive of discount)T&C</h6></p>
      <p ><h6><strong>Bank Offer</strong> 5% Unlimited Cashback on Flipkart Axis Bank Credit Card</h6></p>
      <p ><h6><strong>Bank Offer</strong> 20% off on 1st txn with Amex Network Cards issued by ICICI Bank,IndusInd Bank,SBI Cards and Mobikwik</h6></p>
      <form method="POST" action="{{ route('addtocart', $product->id) }}">
        @csrf
        <button class="btn btn-warning  btn-lg "  type="submit">Add to cart</button>
      </form>
    </div>
     </div>
     </div>
      
@endsection 