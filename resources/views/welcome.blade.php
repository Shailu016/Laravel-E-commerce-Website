<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
    <style>
      body { background:snow;}

      .xyz {
  
  width: 600px;
  height: 200px; 
  display: flex;
  flex-flow: row wrap;
  position: relative;
}

.item {
 
  
 margin:4px;
  flex: 0 1 calc(20% - 4px); 
}
.containerHeight {
 
  width: 35vw;;
  background: white;
}
.img{
  position: absolute;
width: 226px;
height: 165px;
left: 67px;
top: 413px;
border-radius: 12px;
}
html {
  scroll-behavior: smooth;
}
.zoom {
  padding:2px;
  transition: transform .4s; 
}

.zoom:hover {
  transform: scale(1.03);
 }

</style>
</head>
<body>
 <?php
 use App\Http\Controllers\CartController;
 $total = CartController::cartItemCount();
 ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-family: 'Times New Roman', serif;">hyperZod</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"style="font-family: 'Times New Roman', serif;">Home</a>
        </li>
        @role('admin')
        <li class="nav-item">
          <a class="nav-link active" href="/product" style="font-family: 'Times New Roman', serif;">AdminPanel</a>
        </li>
        @endrole
        <li class="nav-item">
          <a class="nav-link active" href="/list" style="font-family: 'Times New Roman', serif;">cart({{$total}})</a>
        </li>
      </ul>
        
       
      <form class="d-flex w-75 m-auto" method='get' action='/search'>
         <input style="font-family: 'Times New Roman', serif;"  class="form-control me-2" type="search" placeholder="Search" name='query' aria-label="Search" value={{request()->input('query')}}>
        <button class="btn btn-success" type="submit"style="font-family: 'Times New Roman', serif;">Search</button>
      </form>
    </div>
  </div>
  <ul class="navbar-nav ml"  style="margin-right:117px; " style="font-family: 'Times New Roman', serif;">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="font-family: 'Times New Roman', serif;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="font-family: 'Times New Roman', serif;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-family: 'Times New Roman', serif;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="font-family: 'Times New Roman', serif;">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
  </nav>


    <div>
        @yield('content')
    </div>
  </body>
</html>