@extends('welcome')
@section('content')
@php(session_start())
    <div class="container">
        <h1 class="latest_title">Laptops</h1>
        <div class="row  mt-2 welcome">
            @foreach($laptops as $laptop )
                <div class="col-md-4">
                    <div class="item">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" style="height:200px" src="{{url('uploads/'.$laptop->images[0]->name)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$laptop->item_name}}</h5>
                                <span>Price : @if (Session::has('price'))
                                        {{$laptop->price * Session::get('price',1)}}{{ Session::get('price-sign',"$")}}

                                @endif</span>
                                <br><br>
                                <a href="{{route('laptop',$laptop->id)}}" class="btn btn-primary mb-3">show More</a>
                                <div class="form-group">
                                    <label style="color: white">Select this item to compare</label>
                                    <input type="checkbox" class="item-check" value="{{$laptop->id}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    </div>
    <div class="compare-box pt-3 px-2" style="display: none">
        <div class="row justify-content-center text-center">
            <div class="col-md-12">
                <h4 class="w-700 d-inline-block mr-5">Do you want to compare this 2 item ?</h4>
                <button class="btn btn-primary d-inline-block ml-5"  id="compare">Compare</button>
            </div>

        </div>

    </div>

@stop
