@extends('welcome')
@section('content')
@role('admin')
<div class="container mt-3 w-50 p-3">
<div class="card w-100 p-3" style="width: 18rem;">
  
  <div class="card-body">
      
  <strong>{{$category->title}}</strong>
  <div>
      {{$category->description}}
  </div>
  </div>
</div>
</div>	
	@endrole	
@endsection 