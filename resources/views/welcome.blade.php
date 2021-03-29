<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    <body class="antialiased">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('image/logo.jfif')}}" class="nav_logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Laptop</a>
                                <a class="dropdown-item" href="#">Mobile</a>
                                <a class="dropdown-item" href="#">smart watch</a>
                                <a class="dropdown-item" href="#">Headphones</a>
                            </div>
                        </li>
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                      
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('image/img1.jpg')}}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('image/img2.jpg')}}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('image/img3.jpg')}}" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('image/img4.jpg')}}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        <h1 class="latest_title">Latest Item</h1>
        <div class="row  mt-2 welcome">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="height:200px" src="https://images.pexels.com/photos/5632357/pexels-photo-5632357.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <span>Price : 34 $</span>
                        <br><br>
                        <a href="#" class="btn btn-primary">show More</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="height:200px" src="https://images.pexels.com/photos/6309756/pexels-photo-6309756.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <span>Price : 34 $</span>
                    <br><br>
                    <a href="#" class="btn btn-primary">show More</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="height:200px" src="https://images.pexels.com/photos/6097871/pexels-photo-6097871.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <span>Price : 34 $</span>
                    <br><br>
                    <a href="#" class="btn btn-primary">show More</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="height:200px" src="https://images.pexels.com/photos/5632357/pexels-photo-5632357.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <span>Price : 34 $</span>
                    <br><br>
                    <a href="#" class="btn btn-primary">show More</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="height:200px" src="https://images.pexels.com/photos/6309756/pexels-photo-6309756.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <span>Price : 34 $</span>
                    <br><br>
                    <a href="#" class="btn btn-primary">show More</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="height:200px" src="https://images.pexels.com/photos/6097871/pexels-photo-6097871.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <span>Price : 34 $</span>
                    <br><br>
                    <a href="#" class="btn btn-primary">show More</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <h1 class="category_title">Category</h1>
        <div class="row all_category">
          <div class="col-lg-3">
            <div class="category">
                <i class="fas fa-laptop"></i>
                <h6>Laptop</h6>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="category">
                <i class="fas fa-mobile-alt"></i>
                <h6>Mobile</h6>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="category">
                <i class="fas fa-headphones"></i>
                <h6>Head Phones</h6>
            </div>
          </div>
          <div class="col-lg-3">
              <div class="category">
                 <i class="far fa-clock"></i>
                 <h6>Smart Watch</h6>
              </div>
          </div>
        </div>
    </div>

    <div class="footer">
     
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{asset('image/logo.jfif')}}"  class="footer_log" alt="">
            </div>
            <div class="col-lg-4">
                <div class="footer_category">
                    <h4>Category</h4>
                    <ul>
                        <li><a href="#">Labtop</a></li>
                        <li><a href="#">Phone</a></li>
                        <li><a href="#">Smart Watch</a></li>
                        <li><a href="#">Head Phones</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
         
    </div>
    <script src="{{asset('js/app.js') }}"></script> 
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      <script>
          $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:3
                    }
                }
            })
          });
      </script>
    </body>
</html>
