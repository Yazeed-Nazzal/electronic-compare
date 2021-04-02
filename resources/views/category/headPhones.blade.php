@extends('welcome')
@section('content')

    <div class="container">
        <h1 class="latest_title">HeadPhones</h1>
        <div class="row  mt-2 welcome">
                @foreach($headphones as $headphone )
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" style="height:200px" src="{{url('uploads/'.$headphone->images[0]->name)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$headphone->item_name}}</h5>
                                    <span>Price : {{$headphone->price}}$</span>
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
