@extends('welcome')
@section('content')

@if(session('message'))
<div class="m-1"style="font-family: 'Times New Roman', serif; font-weight:10px;background-color:whitesmoke;">
    <h5>{{session('message')}}</h5>
    
</div>@endif


<ul class="nav bg p-2" >
@foreach($categories as $category)
  <li class="nav-item">
    <a class="nav-link active" href="#">{{$category->title}}</a>
  </li>
@endforeach
  
  <div id="carouselExampleControls" class="carousel slide w-100 " data-ride="carousel" style="   height:400px;">
  <div class="carousel-inner">
    <div class="carousel-item">
      <img class="d-block w-100  " src="https://images-eu.ssl-images-amazon.com/images/G/31/img19/AmazonPay/Avatar/HeroPC_3000x1200_SVA._CB667240774_.jpg" >
    </div>
    <div class="carousel-item active">
      <img class="d-block w-100  " src="https://images-eu.ssl-images-amazon.com/images/G/31/img21/Wireless/Xiaomi/Mi11X/GW/August/SBI_1/D22704884_WLD_Xiaomi_Mi11X_DesktopTallHero_3000x1200._CB645383927_.jpg" style="">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100  " src="https://images-eu.ssl-images-amazon.com/images/G/31/img2020/img21/apparelGW/U599/AUG/AXIS/3000._CB644584809_.jpg" >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100  " src="https://images-eu.ssl-images-amazon.com/images/G/31/img20/PC/Mayactivation/Accessoriesday1/D23140543_IN_CEPC_Electronicsaccessories_underRs999_3000x1200._CB669031984_.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100  " src="https://images-eu.ssl-images-amazon.com/images/G/31/img21/Wireless/OPPO/Aug_MSD/Family_with_badge/D27296233_IN_WLD_MSD_Aug_OPPO_Family_DesktopTallHero_3000x1200._CB644101419_.jpg" >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100  " src="https://images-eu.ssl-images-amazon.com/images/G/31/IMG19/Furniture/Herotator/WFH/Offer/V2/WFH-Herotator-hero_3000x1200._CB405299567_.jpg" >
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div >
<div class="xyz d-flex w-100 h-100 border "  style=" background:white; box-shadow: 0 0 10px rgba(0,0,0,0.6);
-moz-box-shadow: 0 0 10px rgba(0,0,0,0.6);
-webkit-box-shadow: 0 0 10px rgba(0,0,0,0.6);
-o-box-shadow: 0 0 10px rgba(0,0,0,0.6);
">
  
@foreach($products as $product)

<div class=" border-0 mx-auto" >
  
      <a href="/product/{{$product->id}}"><img class="zoom p-auto"style="width: 294px; height: 300px; object-fit: cover; border-radius:40px box-shadow: 0 0 10px rgba(0,0,0,0.6);
 " src="{{ URL::to('/') }}/images/{{$product->image_path}}">

      </a>
      <p >{{$product->title}}</p>
      <p >Hyperzod's Product</p>
      <p >${{$product->price}}</p><hr>
  
</div>


@endforeach
<div class="d-flex justify-content-center" style="width:100vw;">
  <h4>

    {{
      $products->links('pagination::bootstrap-4')}}

  </h4>                        
</div>
</div>
@endsection