@extends('welcome')
@section('content')

<div class="d-flex">
   <div class="xyz d-flex w-100" style="background:White;">
      @foreach($products as $product)
        <div class="card  item border-0" >
           
           <a href="/product/{{$product->id}}"><img class="zoom"style="width: 294px;  height: 300px; object-fit: cover" src="{{ URL::to('/') }}/images/{{$product->image_path}}"></a>
        </div>
      @endforeach
    </div>
</div>
@endsection 

