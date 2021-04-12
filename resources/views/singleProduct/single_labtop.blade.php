@extends("welcome")

@section("content")

<div class="container">
    <div class="row style_single_page_item">
        <div class="col-lg-4">
            <div class="img_item">
                <img src="{{url('uploads/'.$laptop->images[0]->name)}}" alt="img">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="info_item">
                <div>
                    <h3>{{$laptop->item_name}}</h3>
                </div>
                <div>
                    <p><span>Company Made :</span> {{$laptop->company}}</p>
                </div>
                <div>
                    <p><span>Price :</span>: @if (Session::has('price'))
                                {{$laptop->price * Session::get('price',1)}} {{ Session::get('price-sign',"$")}}

                            @endif</p>
                </div>
                <div>
                    <p><span>Description :</span> {{$laptop->description}}</p>
                </div>
                <hr>
                <div class="main_info">
                    <div>
                        <p><span>Ram :</span> {{$laptop->laptop->ram}} GB</p>
                    </div>
                    <div>
                        <p><span>Processor :</span> {{$laptop->laptop->processor}} </p>
                    </div>
                </div>
                <div class="main_info">
                    <div>
                        <p><span>Gpu</span> {{$laptop->laptop->gpu}}</p>
                    </div>
                    <div>
                        <p><span>Storage :</span> {{$laptop->laptop->storage}} </p>
                    </div>
                </div>
                <hr>
                <h6>More Features</h6>
                <div class="main_info">
                    @foreach($laptop->features as $feature)
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

                @comments(['model' => App\Models\Item::find($laptop->id)])

        </div>
    </div>
</div>

@endsection
