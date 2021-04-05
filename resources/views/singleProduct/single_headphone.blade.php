@extends("welcome")

@section("content")

<div class="container">
    <div class="row style_single_page_item">
        <div class="col-lg-4">
            <div class="img_item">
                <img src="{{url('uploads/'.$headphone->images[0]->name)}}" alt="img">
            </div>
        </div>
        <div class="col-lg-8">
            <div class="info_item">
                <div>
                    <h3>{{$headphone->item_name}}</h3>
                </div>
                <div>
                    <p><span>Company Made :</span> {{$headphone->company}}</p>
                </div>
                <div>
                    <p><span>Price :</span>{{$headphone->price}}$</p>
                </div>
                <div>
                    <p><span>Description :</span> {{$headphone->description}}</p>  
                </div>
                <hr>
              
                <div class="main_info">
                    <div>
                        <p><span>Type :</span> {{$headphone->headphone->type}}</p>  
                    </div>
                    <div>
                        <p><span>Battery :</span> {{$headphone->headphone->battery}} mah</p>  
                    </div>
                </div>
                <hr>
                <h6>More Features</h6>
                <div class="main_info">
                    @foreach($headphone->features as $feature)
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
           
                @comments(['model' => App\Models\Item::find($headphone->id)])
       
        </div>
    </div>
</div>

@endsection