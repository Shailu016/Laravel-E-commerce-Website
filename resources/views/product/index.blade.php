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
<div >

<table class="table" >
  <thead>
    <tr>
      <th scope="col">ProductId</th>
      <th scope="col">Title</th>
      <th scope="col">Excerpt</th>
      <th scope="col">Description</th>
      <th scope="col">Actions<a class="btn btn-secondary"href="/product/create" >AddProduct</a></th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->title}}</td>
        <td>{{$product->excerpt}}</td>
        <td>{{$product->body}}</td>
        <td>
          <a class="btn btn-secondary" href='/product/{{$product->id}}/destroy'>Delete</a>
          <a  class="btn btn-secondary"  href='/product/{{$product->id}}/edit'>Edit</a>
        </td>
        
	    </tr>
   @endforeach
  </tbody>
</table> 
</div>
</div>


</div>


@endsection