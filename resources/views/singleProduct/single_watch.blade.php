@extends("welcome")

@section("content")

<div class="container">
    <div class="row style_single_page_item">
        <div class="col-lg-4">
            <div class="img_item">
                <img src="{{url('uploads/'.$watch->images[0]->name)}}" alt="img">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="info_item">
                <div>
                    <h3>{{$watch->item_name}}</h3>
                </div>
                <div>
                    <p><span>Company Made :</span> {{$watch->company}}</p>
                </div>
                <div>
                    <p><span>Price :</span>:
                            {{$watch->price * Session::get('price',1)}}{{ Session::get('price-sign',"$")}}
                        </p>
                </div>
                <div>
                    <p><span>Description :</span> {{$watch->description}}</p>
                </div>
                <hr>
                <div class="main_info">
                    <div>
                        <p><span>Battery :</span> {{$watch->watch->Battery}} </p>
                    </div>
                    <div>
                    @if($watch->watch->waterproof == 1)
                    <p><span>Waterproof : Avaliable</span> </p>
                    @elseif($watch->watch->waterproof == 2)
                    <p><span>Waterproof : Not Avaliable</span> </p>
                    @endif
                    </div>
                    <div>
                    @if($watch->watch->calling == 1)
                    <p><span>Calling : Avaliable</span> </p>
                    @elseif($watch->watch->calling == 2)
                    <p><span>Calling : Not Avaliable</span> </p>
                    @endif
                    </div>
                </div>
                <hr>
                <h6>More Features</h6>
                <div class="main_info">
                    @foreach($watch->features as $feature)
                    <div>
                        <p><span>{{$feature->feature_name}} : </span> {{$feature->feature_value}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h3 class="mt-5">Comments</h3>
    <div class="row mt-5">
        <div class="col-lg-12">

                @comments(['model' => App\Models\Item::find($watch->id)])

        </div>
    </div>
</div>

@endsection
