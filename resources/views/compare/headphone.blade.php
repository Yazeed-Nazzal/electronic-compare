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
                        <p><span>Price :</span>{{$item1->price}}$</p>
                    </div>
                    <div>
                        <p><span>Description :</span> {{$item1->description}}</p>
                    </div>
                    <hr>
                    <div class="main_info">
                        <div>
                            <p><span>Type :</span> {{$item1->headphone->type}}</p>
                        </div>
                            @if ($item1->headphone->type == "Bluetooth")
                            <div>
                                <p><span>Battery :</span> {{$item1->headphone->battery}} MA</p>
                            </div>
                            @else
                            @endif
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
                        <p><span>Price :</span>{{$item2->price}}$</p>
                    </div>
                    <div>
                        <p><span>Description :</span> {{$item2->description}}</p>
                    </div>
                    <hr>
                    <div class="main_info">
                        <div>
                            <p><span>Type :</span> {{$item2->headphone->type}}</p>
                        </div>
                        @if ($item2->headphone->type == "Bluetooth")
                            <div>
                                <p><span>Battery :</span> {{$item2->headphone->battery}} MA</p>
                            </div>
                        @else
                        @endif
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
