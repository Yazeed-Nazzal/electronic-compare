@extends("welcome")

@section("content")

    <div class="container-fluid">
        <div class="row justify-content-center style_single_page_item ">
            <div class="col-md-6">
                <div class="info_item">
                    <div class="w-50 mb-3">
                        <img class="rounded"   src="{{url('uploads/'.$item1->images[0]->name)}}" alt="img" style="width: 200px"; height="200px">
                    </div>
                    <div>
                        <h1 style="text-transform: capitalize">{{$item1->item_name}}</h1>
                    </div>
                    <div>
                        <p><span>Company Made :</span> {{$item1->company}}</p>
                    </div>
                    <div>
                        <p><span>Price :</span>: @if (Session::has('price'))
                                {{$item1->price * Session::get('price',1)}}{{ Session::get('price-sign',"$")}}

                            @endif</p>
                    </div>
                    <div>
                        <p><span>Description :</span> {{$item1->description}}</p>
                    </div>
                    <hr>
                    <div class="main_info">
                        <div>
                            <p><span>Water Proofing :</span>
                                @if ($item1->watch->waterproof)
                                    Water Proof
                                @else
                                    Not Water Proof
                                @endif
                            </p>
                        </div>
                        <div>
                            <p><span>Calling :</span>
                                @if ($item1->watch->calling)
                                    Support Make Calling

                                @else
                                    Doesn't Support Make Calling
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <h6>More Features</h6>
                    <div class="main_info">
                        @foreach($item1->features as $feature)
                            <div>
                                <p><span>{{$feature->feature_name}} : </span> {{$feature->feature_value}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info_item">
                    <div class="w-50 mb-3">
                        <img class="rounded"   src="{{url('uploads/'.$item2->images[0]->name)}}" alt="img" style="width: 200px"; height="200px">
                    </div>
                    <div>
                        <h1 style="text-transform: capitalize">{{$item2->item_name}}</h1>
                    </div>
                    <div>
                        <p><span>Company Made :</span> {{$item2->company}}</p>
                    </div>
                    <div>
                        <p><span>Price :</span>:
                                {{$item2->price * Session::get('price',1)}}{{ Session::get('price-sign',"$")}}

                       </p>
                    </div>
                    <div>
                        <p><span>Description :</span> {{$item2->description}}</p>
                    </div>
                    <hr>
                    <div class="main_info">
                        <div>
                            <p><span>Water Proofing :</span>
                                @if ($item2->watch->waterproof)
                                     Water Proof
                                @else
                                    Not Water Proof
                                @endif
                            </p>
                        </div>
                        <div>
                            <p><span>Calling :</span>
                                @if ($item2->watch->calling)
                                    Support Make Calling

                                @else
                                    Doesn't Support Make Calling
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <h6>More Features</h6>
                    <div class="main_info">
                        @foreach($item2->features as $feature)
                            <div>
                                <p><span>{{$feature->feature_name}} : </span> {{$feature->feature_value}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection
