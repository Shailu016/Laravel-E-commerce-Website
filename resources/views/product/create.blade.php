@extends('layouts.app')
@section('content')
@role('admin')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class=" m-auto my-3 w-75 p-3">
<div class="m-1 container justify-content-center w-75 p-3">
<h1 class ='p-3'>Add Product</h1>
<form method="post" action='/product' enctype ="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Product Name</label>
    <input type="text" name = 'title' class="form-control">
     @if($errors->has('title'))
        <p style='color:red;'>{{$errors->first('title')}}</p>
     @endif
  </div>
   <label for="image">Choose a product picture:</label>
   <input type="file" id="image" name="image">
  <div class="mb-3">
    <label for="excerpt" class="form-label">Excerpt</label>
    <input type="text" name = 'excerpt' class="form-control" >
    @if($errors->has('price'))
            <p style='color:red;'>{{$errors->first('excerpt')}}</p>
            @endif
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name = 'price' class="form-control" >
    @if($errors->has('price'))
            <p style='color:red;'>{{$errors->first('price')}}</p>
            @endif
  </div>

  <label for="category">Choose a category:</label>
  <select id="category" name="category_id" >
  
  @foreach ($categories as $category)
  <option value="{{$category->id}}">{{$category->title}}</option>
  @endforeach
  </select>
 
  <div class="mb-3">
    <label  for="body" class="form-label">Body</label>
    <input type="text" name = 'body' class="form-control" >
    @if($errors->has('body'))
            <p style='color:red;'>{{$errors->first('body')}}</p>
            @endif
  </div>
  <button type="submit" class="btn btn-dark ">Submit</button>
</form>
</div>
</div>
@endrole
@endsection