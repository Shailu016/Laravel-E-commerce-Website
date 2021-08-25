@extends('layouts.app')
@section('content')
@role('admin')

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
<table class="table">
  <thead>
    <tr>
      <th scope="col">CategoryId</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
      <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->title}}</td>
        <td>{{$category->description}}</td>
        <td><a class="btn btn-dark" href="/category/{{$category->id}}/destroy">delete</a>
        <a class="btn btn-dark" href="/category/{{$category->id}}/edit">edit</ a>
        </td>
	    </tr>
   @endforeach
  </tbody>
</table> 
</div>
@endrole
@endsection