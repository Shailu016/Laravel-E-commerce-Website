@extends('layouts.app')
@section('content')
@role('admin')
<div class=" m-auto my-3  w-75 p-3">
<div class="m-1 container justify-content-center w-75 p-3">
<h1 class ='p-3'>Update Category</h1>
<form  method="POST" action="/category/{{ $category->id }}">
        @csrf
        <input type="hidden" name="_method" value=" PUT ">
  <div class="mb-3">
    <label for="title" class="form-label">Category Name</label>
    <input type="text" name = 'title' class="form-control" value ="{{$category->title}}">
     @if($errors->has('title'))
            <p style='color:red;'>{{$errors->first('title')}}</p>
     @endif
  </div>
 
  <div class="mb-3">
    <label  for="description" class="form-label">Description</label>
    <input type="text" name = 'description' class="form-control" value ="{{$category->description}}">
    @if($errors->has('description'))
            <p style='color:red;'>{{$errors->first('description')}}</p>
            @endif
  </div>
  <button type="submit" class="btn btn-dark ">Submit</button>
</form>

</div>
</div>
@endrole
@endsection