@extends("welcome")

@section("content")

<div class="container">
    <div class="row style_single_page_item">
        <div class="col-lg-4">
            <div class="img_item">
                <img src="{{url('uploads/'.$phone->images[0]->name)}}" alt="img">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="info_item">
                <div>
                    <h3>{{$phone->item_name}}</h3>
                </div>
                <div>
                    <p><span>Company Made :</span> {{$phone->company}}</p>
                </div>
                <div>
                    <p><span>Price :</span>: @if (Session::has('price'))
                            {{$phone->price * Session::get('price',1)}}{{ Session::get('price-sign',"$")}}

                        @endif</p>
                </div>
                <div>
                    <p><span>Description :</span> {{$phone->description}}</p>
                </div>
                <hr>
                <div class="main_info">
                    <div>
                        <p><span>Ram :</span> {{$phone->phone->ram}} GB</p>
                    </div>
                    <div>
                        <p><span>Front Camera :</span> {{$phone->phone->front_cam}} MP</p>
                    </div>
                    <div>
                        <p><span>Rear Camera :</span> {{$phone->phone->rear_cam}} MP</p>
                    </div>
                </div>
                <div class="main_info">
                    <div>
                        <p><span>Storage :</span> {{$phone->phone->storage}} GB</p>
                    </div>
                    <div>
                        <p><span>Battery :</span> {{$phone->phone->battery}} mah</p>
                    </div>
                    <div>
                        <p><span>Screen :</span> {{$phone->phone->screen}} inches</p>
                    </div>
                </div>
                <hr>
                <h6>More Features</h6>
                <div class="main_info">
                    @foreach($phone->features as $feature)
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

                @comments(['model' => App\Models\Item::find($phone->id)])

        </div>
    </div>
</div>

@endsection
