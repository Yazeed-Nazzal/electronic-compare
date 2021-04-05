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
                            <p><span>Ram :</span> {{$item1->phone->ram}} GB</p>
                        </div>
                        <div>
                            <p><span>Front Camera :</span> {{$item1->phone->front_cam}} MP</p>
                        </div>
                        <div>
                            <p><span>Rear Camera :</span> {{$item1->phone->rear_cam}} MP</p>
                        </div>
                    </div>
                    <div class="main_info">
                        <div>
                            <p><span>Storage :</span> {{$item1->phone->storage}} GB</p>
                        </div>
                        <div>
                            <p><span>Battery :</span> {{$item1->phone->battery}} mah</p>
                        </div>
                        <div>
                            <p><span>Screen :</span> {{$item1->phone->screen}} inches</p>
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
                        <img class="rounded" src="{{url('uploads/'.$item2->images[0]->name)}}" alt="img" style="width: 200px"; height="200px">
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
                            <p><span>Ram :</span> {{$item2->phone->ram}} GB</p>
                        </div>
                        <div>
                            <p><span>Front Camera :</span> {{$item2->phone->front_cam}} MP</p>
                        </div>
                        <div>
                            <p><span>Rear Camera :</span> {{$item1->phone->rear_cam}} MP</p>
                        </div>
                    </div>
                    <div class="main_info">
                        <div>
                            <p><span>Storage :</span> {{$item2->phone->storage}} GB</p>
                        </div>
                        <div>
                            <p><span>Battery :</span> {{$item2->phone->battery}} mah</p>
                        </div>
                        <div>
                            <p><span>Screen :</span> {{$item2->phone->screen}} inches</p>
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
