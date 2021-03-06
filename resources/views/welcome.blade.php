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
        <style>
            .backgroung_home_user{
                background-color: #fff;
            }
        </style>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/category/laptop">Laptop</a</li>
                    <li class="nav-item"><a class="nav-link"  href="{{url('/category/phone')}}">Mobile</a></li>
                    <li class="nav-item"><a class="nav-link"  href="/category/watch">smart watch</a></li>
                    <li class="nav-item"><a class="nav-link"  href="/category/headphone">Headphones</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    @guest
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
                                <a class="dropdown-item" href="/profile/edit/{{auth()->user()->id}}">Edit Profile</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Price IN
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/Price/dollar">Dollar</a>
                                <a class="dropdown-item" href="/Price/euro">Euro</a>
                                <a class="dropdown-item" href="/Price/dinar">Jordanian Dinar</a>


                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    @yield("content")


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
            @yield('script')
    <script>
        let totalItem = 0;
        let item1;
        let  item2;
        $(document).on('change','.item-check' ,function (e){
            if ($(this).prop('checked')){
                if (totalItem == 0){
                    item1= $(this).val();
                    totalItem++;
                }
                else if(totalItem == 1) {
                    item2= $(this).val();
                    totalItem++;
                }
                else {
                    alert('you cant compare more than 1 item remove one then chose new one')
                }
                if (totalItem == 2){
                    $('.compare-box').show();
                }
            }
            else {
                if (totalItem ==1){
                    if ($(this).val() == item1){
                        item1=""
                    }
                }
                else if (totalItem == 2){
                    if($(this).val() == item1){
                        item1 = "";
                    }
                    else {
                        item2 = ""
                    }
                }

                totalItem--;
                $('.compare-box').hide();
            }

            console.log(item1);
            console.log("/////")
            console.log(item2);
        });
        $(document).on('click','#compare',function (){
            if (totalItem != 2){
                alert('You Should chose 2 item to compare ')
            }
            else{
                if (item1 != "" && item2 != ""){
                    window.location.href = "http://127.0.0.1:8000/item/compare/"+item1+"/"+item2;
                }
            }


        });

    </script>
    </body>
</html>
