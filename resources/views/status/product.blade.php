
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<div class="container w-100">Details</div>
<div class="container" style="display:flex  border-radius:12; ">
@foreach ($ps as $p)
<div class=" container border " style=" box-shadow: 10px 10px 8px #888888;">

<div class="card border-0 mx-1 item d-flex m-3 flex-row" style=" background: white;  object-fit: cover ;">
      <img style="width: 226px;  height: 165px; object-fit: cover" class="card-img-top" src="{{ URL::to('/') }}/images/{{$p->image_path}}" alt="Card image cap">
      <div class="container">
      <h6 class="mt-2">Name: {{$p->title}}</h6>
      <h6>Price: {{$p->price}}</h6>
      <h6>ProductId: {{$p->id}}</h6>
      
      </div>
 
</div>
 @endforeach
</div>
<div class = " mt-3 container p-4 border"style="box-shadow: 10px 10px 8px #888888;">
<table class="table " >
  <thead>
    <tr>
      <th scope="col">OrderId</th>
      <th scope="col">Product_id</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
</tr>
  </thead>
  <tbody>
 @foreach ($products as $product)
      <tr>
        <th scope="row"><h5>{{$product->order_id}}</h5></th>
        <td><h5>{{$product->product_id}}</h5></td>
        <td><h5>${{$product->price}}</h5></td>
        <td><h5>{{$product->quantity}}</h5></td>
      </tr>
        @endforeach
   </tbody>
   </table> 
</div>



    
