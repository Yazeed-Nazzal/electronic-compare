@extends('welcome')
@section('content')

    <div class="container">
        <h1 class="latest_title">Mobiles</h1>
        <div class="row  mt-2 welcome">
            @foreach($phones as $phone )
                <div class="col-lg-4">
                    <div class="item">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" style="height:200px" src="{{url('uploads/'.$phone->images[0]->name)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$phone->item_name}}</h5>
                                <span>Price : {{$phone->price}}$</span>
                                <br><br>
                                <a href="{{route('phone',$phone->id)}}" class="btn btn-primary">show More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>

@stop

