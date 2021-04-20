@extends("welcome")

@section("content")
    <div class="backgroung_home_user">
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


                    @foreach($items as $item )
                        <div class="item">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" style="height:200px"
                                     src="{{url('uploads/'.$item->images[0]->name)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <span>Price :
                                            {{$item->price * Session::get('price',1)}}{{ Session::get('price-sign',"$")}}

                                        </span>
                                    <br><br>
                                    @php
                                        $cat = $item->category_id;


                                        switch ($cat){
                                           case '1':
                                               $cat = 'laptop';
                                               break;
                                            case '2':
                                                 $cat = 'phone';
                                                 break;
                                            case '3' :
                                                $cat = 'watch';
                                                break;
                                            case '4':
                                                $cat = 'headphone';
                                                break;
                                        }
                                    @endphp
                                    <a href="{{route($cat,$item->id)}}" class="btn btn-primary mb-3">show More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="category_title">Category</h1>
            <div class="row all_category">
                <div class="col-lg-3">
                    <div class="category">
                        <i class="fas fa-laptop"></i>
                        <h6><a href="/category/laptop">Laptop</a></h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category">
                        <i class="fas fa-mobile-alt"></i>
                        <h6><a href="/category/phone">Mobile</a></h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category">
                        <i class="fas fa-headphones"></i>
                        <h6><a href="/category/headphone">Head Phones</a></h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category">
                        <i class="far fa-clock"></i>
                        <h6><a href="/category/watch">Smart Watch</a></h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{asset('image/logo.jfif')}}" class="footer_log" alt="">
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_category">
                            <h4>Category</h4>
                            <ul>
                                <li><a href="/category/laptop">Labtop</a></li>
                                <li><a href="/category/phone">Phone</a></li>
                                <li><a href="/category/watch">Smart Watch</a></li>
                                <li><a href="/category/headphone">Head Phones</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
