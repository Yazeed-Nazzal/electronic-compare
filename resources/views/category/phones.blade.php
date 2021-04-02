@extends('welcome')
@section('content')

    <div class="container">
        <h1 class="latest_title">Mobiles</h1>
        <div class="row  mt-2 welcome">
            @foreach($phones as $phone )
                <div class="col-md-3">
                    <div class="item">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" style="height:200px" src="https://images.pexels.com/photos/6097871/pexels-photo-6097871.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$phone->name}}</h5>
                                <span>Price : {{$phone->price}}$</span>
                                <br><br>
                                <a href="#" class="btn btn-primary">show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>

@stop

