@extends('layouts.app')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

<div class="d-flex">
<div class="col-2 border" style="background-color:#101010;">
<div class="container"><a href="/product"><h1 class="text-light" style="font-family: 'Times New Roman', serif;">Admin</h1></a></div>

          
<h5 class="mt-4 "><a class="text-light" style=" font-family: Arial, Helvetica, sans-serif;" href="/dashboard">Dashboard</a></h5>
<h5 class="mt-4 "><a class="text-light" style=" font-family: Arial, Helvetica, sans-serif;" href="/category">Categories</a></h5>
            
             <h5 class="mt-4 "><a class="text-light" style=" font-family: Arial, Helvetica, sans-serif;" href="/status">Orders</a> </h5>
             <h5 class="mt-4 "><a class="text-light" style=" font-family: Arial, Helvetica, sans-serif;" href="/current">Today's Order</a> </h5>
             
          
      
    
  </div>

  <div class="col-10">
            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <i class="fa fa-user fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Products</h6>
                            <h1 class="display-4">{{$products}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <i class="fa fa-list fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Orders</h6>
                            <h1 class="display-4">{{$orders}}</h1>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <i class="fa fa-twitter fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Today's Order</h6>
                            <h1 class="display-4">{{$todays}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <div class="rotate">
                                <i class="fa fa-share fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase">Estimated Profit</h6>
                            <h1 class="display-4">${{$profit}}</h1>
                        </div>
                    </div>
                </div>
            </div>

            
            <a id="features"></a>
            
            <div class="row my-4">
                <div class="col-lg-3 col-md-4">
                    <div class="card">
                       
                       
                    </div>
                    <div class="card card-inverse bg-inverse mt-3" style="background:#663399;">
                    <div class="card-body">
                            <div class="rotate">
                                <i class="fa fa-share fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase  text-light">Pending Orders</h6>
                            <h1 class="display-4  text-light">{{$pending}}</h1>
                            
                        </div>
                    </div>
                    <div class="card card-inverse bg-inverse mt-3" style="background:#CD853F;">
                    <div class="card-body">
                            <div class="rotate">
                                <i class="fa fa-share fa-4x"></i>
                            </div>
                            <h6 class="text-uppercase text-light">Estimated Loss</h6>
                            <h1 class="display-4  text-light">-${{$loss}}</h1>
                            
                        </div>
                    </div>
                    <div class="card card-inverse bg-inverse mt-3" style="background:white; height:450px;">
                    <div class="card-body">
                            <div class="rotate">
                                <i class="fa fa-share fa-4x"></i>
                            </div>
                            <img style="width:220px;"src="data:image/png;base64,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" alt="">

                            <img style="width:220px;" src="data:image/png;base64,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" alt="">

                            <img style="width:220px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEyX1UgyCWZwRKmmtwzd8MFO07e8NHExfyOg&usqp=CAU" alt="">
                          
                        </div>
                    </div>
                   
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>OrderId</th>
                                    <th>PaymentMethod</th>
                                    <th>OrderStatus</th>
                                    <th>DeliveryAddress</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $orderstatus as $order)
                                    
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->delivery_address}}</td>
                                    <td>{{$order->created_at}}</td>
                                    
                                </tr>
                                @endforeach
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            </div>
           
<footer class="container-fluid">
    <p class="text-right small">©2020-2021 HyperZod private limited</p>
</footer>

@endsection
